$(() => {
    $("#products-datatable").DataTable({
        destroy: true,
        "language": {
            "paginate": {
                "previous": "<span style='font-size: 18px'><i class='fa fa-chevron-left'></i></span>",
                "next": "<span style='font-size: 18px'><i class='fa fa-chevron-right'></i></span>",
            }
        },
        ajax: {
            url: "/admin/products",
            type: "POST",
            dataType: "json",
            dataSrc: "data",
            contentType: "application/json",
            beforeSend: function (request) {
                request.setRequestHeader(
                    "X-CSRF-TOKEN",
                    $('meta[name="csrf-token"]').attr("content")
                );
            },
            data: data => {
                data.page = data.start / data.length + 1;
                data.per_page = data.length;
                data.searchData = data.search
                data.search = data.search.value
                // console.log(data);
                return JSON.stringify(data);
            },
            dataFilter: data => {
                // console.log(data)
                var json = jQuery.parseJSON(data);
                json.recordsTotal = json.pagination.total;
                json.recordsFiltered = json.pagination.total;
                // console.log(json);
                return JSON.stringify(json);
            }
        },
        pagingType: "simple_numbers",
        processing: true,
        serverSide: true,
        deferRender: true,
        paging: true,
        autoWidth: false,
        searching: true,
        ordering: false,
        responsive: true,
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        pageLength: 10,
        columns: [{
                width: "1%",
                defaultContent: ""
            }, {
                width: "1%",
                data: "id"
            },
            {
                width: "15%",
                data: "name"
            },
            {
                width: "20%",
                data: "desc",
                data: (row) => {
                    return strLimit(row.desc, 30)
                }
            },
            {
                width: "10%",
                data: "brand",
                data: (row) => {
                    return row.brand ? row.brand.name : null;
                }
            },
            {
                width: "5%",
                data: "qty",
            },
            {
                width: "5%",
                data: "type",
            },
            {
                width: "15%",
                data: "img",
                render: (data, type, row) => {
                    $imgHtml = "";
                    if ($.isArray(data)) {
                        $.each(data, (i, el) => {
                            $imgHtml +=
                                '<img width="100px" class="mx-1" src="' +
                                el +
                                '" alt="Gambar Product">';
                        });
                    }
                    return $imgHtml;
                }
            },
            {
                width: "10%",
                render: (data, type, row) => {
                    return (
                        '\
                        <button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-md product-edit" data-id=' +
                        row.id +
                        ' title="Edit">\
                            <i class="fa fa-edit"></i>\
                        </button>\
                        <button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-md product-del" data-id=' +
                        row.id +
                        ' title="Delete">\
                            <i class="fa fa-trash"></i>\
                        </button>\
                    '
                    );
                },
                defaultContent: ""
            }
        ],
        "drawCallback": function (settings, json) {
            $(".product-del").click((e) => {
                e.preventDefault();
                $this = $(e.currentTarget)
                $id = $($this).data('id')
                swal2Confirm("Delete Product", "You will delete product, continue?", "warning", () => {
                    $.ajax({
                        type: "DELETE",
                        url: base_url + "admin/products/" + $id,
                        success: function (data) {
                            show_alert('Product Deleted!', 'Product successfully deleted', null, null, null, () => {
                                window.location.reload()
                            });
                        },
                        error: function (data) {
                            show_alert('Error', 'Oops... Something went wrong!', data);
                        },
                    });
                })
            })
            $(".product-edit").click((e) => {
                // console.log("execute brand-edit")
                e.preventDefault();
                $this = $(e.currentTarget)
                $id = $($this).data('id')
                $modal = ".modal#product-edit";
                (async () => {
                    await $.get({
                            dataType: "json",
                            url: base_url + 'admin/products/' + $id
                        })
                        .done((res) => {
                            formHelper.edit(res.data, $modal)
                        })
                        .fail((err) => {
                            swal.fire('Gagal Memuat data', err.responseJSON.message, 'error')
                        })
                    $($modal).modal()
                    formHelper.initCallback = () => {
                        // handle brand list select2
                        if (formHelper.rawData.brand) {
                            $newOption = $("<option selected='selected'></option>").val(formHelper.rawData.brand.id).text(formHelper.rawData.brand.name)
                            $("select.brand-list").append($newOption).trigger('change');
                        }
                        if (formHelper.rawData.type)
                            $("select.type-list").eq(0).val(formHelper.rawData.type).trigger('change')
                    }
                    formHelper.init(true);
                })();
                $($modal).find(".submit").click((e) => {
                    // console.log("execute brand-edit-submit")
                    e.preventDefault();
                    $this = $(e.currentTarget)
                    $($this).prop('disabled', true)
                    let $data = formHelper.getData($modal)
                    console.log($data);
                    $.ajax({
                            method: "PUT",
                            dataType: "json",
                            url: base_url + 'admin/products/' + $id,
                            data: $data
                        })
                        .done((res) => {
                            show_alert('Brand Updated', null, null, null, null, () => {
                                window.location.reload()
                            });
                        })
                        .fail((err) => {
                            $($this).prop('disabled', false)
                            show_alert('Update Brand Error!', '', err)
                        })
                })
            })
        }
    });

    $(".product-create").unbind().click((e) => {
        e.preventDefault();

        // console.log("execute brand-create")
        $this = $(e.currentTarget)
        $modal = ".modal#product-create";
        $($modal).modal()
        $($modal).find(".submit").unbind().click((e) => {
            e.preventDefault();

            // console.log("execute product-create-submit")
            $this = $(e.currentTarget)
            $($this).prop('disabled', true)
            let $data = formHelper.getData($modal)
            $.ajax({
                    method: "POST",
                    dataType: "json",
                    url: base_url + 'admin/products/create',
                    data: $data
                })
                .done((res) => {
                    show_alert('Product Created!', null, null, null, null, () => {
                        window.location.reload()
                    });
                })
                .fail((err) => {
                    $($this).prop('disabled', false)
                    show_alert('Create Product Error!', '', err)
                })
        })
    })

    let $selectBrandConfig = {
        placeholder: "Select Brand ...",
        theme: 'bootstrap4',
        ajax: {
            method: 'post',
            url: base_url + 'admin/brands',
            dataType: 'json',
            data: function (params) {
                var query = {
                    search: params.term,
                    // page: params.page,
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                // let $more = (page * 10) < data.pagination.total;
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: $.map(data.data, (el) => {
                        return {
                            text: el.name,
                            slug: el.name,
                            id: el.id
                        }
                    }),
                    // more: $more
                };
            },
            cache: true,
        }
    }
    let $selectTypeConfig = {
        placeholder: "Select Type ...",
        minimumResultsForSearch: -1,
        theme: 'bootstrap4',
        data: [{
                id: 'MOTOR',
                text: 'MOTOR'
            },
            {
                id: 'MOBIL',
                text: 'MOBIL'
            },
        ]
    }
    $("select.brand-list").select2($selectBrandConfig)
    // handle brand list select2
    $("select.type-list").select2($selectTypeConfig)

});
