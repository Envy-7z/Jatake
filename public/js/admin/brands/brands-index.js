$(() => {
    $("#brands-datatable").DataTable({
        destroy: true,
        "language": {
            "paginate": {
                "previous": "<span style='font-size: 18px'><i class='fa fa-chevron-left'></i></span>",
                "next": "<span style='font-size: 18px'><i class='fa fa-chevron-right'></i></span>",
            }
        },
        ajax: {
            url: "/admin/brands",
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
                width: "5%",
                data: "name"
            },
            {
                width: "40%",
                data: "desc"
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
                        <button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-md brand-edit" data-id=' +
                        row.id +
                        ' title="Edit">\
                            <i class="fa fa-edit"></i>\
                        </button>\
                        <button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-md brand-del" data-id=' +
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
            $(".brand-del").click((e) => {
                e.preventDefault();
                $this = $(e.currentTarget)
                $id = $($this).data('id')
                swal2Confirm("Delete Brand", "You will delete brand, continue?", "warning", () => {
                    $.ajax({
                        type: "DELETE",
                        url: base_url + "/admin/brands/" + $id,
                        success: function (data) {
                            show_alert('Brand Deleted!', 'Brand successfully deleted', null, null, null, () => {
                                window.location.reload()
                            });
                        },
                        error: function (data) {
                            show_alert('Error', 'Oops... Something went wrong!');
                        },
                    });
                })
            })
            $(".brand-edit").click((e) => {
                // console.log("execute brand-edit")
                e.preventDefault();
                $this = $(e.currentTarget)
                $id = $($this).data('id')
                $modal = ".modal#brand-edit";
                $.get({
                        dataType: "json",
                        url: base_url + 'admin/brands/' + $id
                    })
                    .done((res) => {
                        formHelper.edit(res.data, $modal)
                    })
                    .fail((err) => {
                        swal.fire('Gagal Memuat data', err.responseJSON.message, 'error')
                    })
                $($modal).modal()
                $($modal).find(".submit").click((e) => {
                    // console.log("execute brand-edit-submit")
                    e.preventDefault();
                    $this = $(e.currentTarget)
                    $($this).prop('disabled', true)
                    let $data = formHelper.getData($modal)
                    $.ajax({
                            method: "PUT",
                            dataType: "json",
                            url: base_url + 'admin/brands/' + $id,
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

    $(".brand-create").unbind().click((e) => {
        e.preventDefault();

        // console.log("execute brand-create")
        $this = $(e.currentTarget)
        $modal = ".modal#brand-create";
        $($modal).modal()
        $($modal).find(".submit").unbind().click((e) => {
            e.preventDefault();

            // console.log("execute brand-create-submit")
            $this = $(e.currentTarget)
            $($this).prop('disabled', true)
            let $data = formHelper.getData($modal)
            console.log($data);
            $.ajax({
                    method: "POST",
                    dataType: "json",
                    url: base_url + 'admin/brands/create',
                    data: $data
                })
                .done((res) => {
                    show_alert('Brand Created!', null, null, null, null, () => {
                        window.location.reload()
                    });
                })
                .fail((err) => {
                    $($this).prop('disabled', false)
                    show_alert('Create Brand Error!', '', err)
                })
        })
    })
});
