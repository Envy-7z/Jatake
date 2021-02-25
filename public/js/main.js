const base_url = window.location.origin + "/";
$(function () {
    // include library
    let $lib = $("<script></script>").attr("src", "/js/library.js");
    $("head").append($lib);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    // $("#sc-category a").click(function(e) {
    //     e.preventDefault();

    //     $(this)
    //         .parent()
    //         .siblings()
    //         .removeClass("active");
    //     $(this)
    //         .parent()
    //         .addClass("active");
    //     $("#sc-products .products-card").fadeIn(0);

    //     var type = $(this).data("type");
    //     if (type == "all") {
    //         $("#sc-banner").fadeIn(0);
    //     } else {
    //         $("#sc-banner").fadeOut(0);
    //         $("#sc-products .products-card").map(function() {
    //             if ($(this).data("type") != type) $(this).fadeOut(0);
    //         });
    //     }
    // });
});

$(window).on("load", () => {
    $("#page-loader-wrapper").fadeOut("slow");
});

function svgInline($el) {
    var $img = $($el);
    var imgID = $img.attr("id");
    var imgClass = $img.attr("class");
    var imgURL = $img.attr("src");

    $.get(
        imgURL,
        function (data) {
            // Get the SVG tag, ignore the rest
            var $svg = $(data).find("svg");

            // Add replaced image's ID to the new SVG
            if (typeof imgID !== "undefined") {
                $svg = $svg.attr("id", imgID);
            }
            // Add replaced image's classes to the new SVG
            if (typeof imgClass !== "undefined") {
                $svg = $svg.attr("class", imgClass + " replaced-svg");
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr("xmlns:a");

            // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
            if (
                !$svg.attr("viewBox") &&
                $svg.attr("height") &&
                $svg.attr("width")
            ) {
                $svg.attr(
                    "viewBox",
                    "0 0 " + $svg.attr("height") + " " + $svg.attr("width")
                );
            }

            // Replace image with new SVG
            let $el = $("<div/>")
                .addClass("svg-wrapper")
                .append($svg);
            $el.find("svg")
                .attr("height", $img.height() + "px")
                .attr("width", $img.width() + "px");

            $img.replaceWith($el);
        },
        "xml"
    );
}


$(document).ready(() => {
    $(".copylink").click(function (e) {
        e.preventDefault();
        let $idTarget = $(this).data("input");
        let $target = $($idTarget);
        try {
            $target.select();
            document.execCommand("copy");
            swal.fire("Woohoo!", "Link referral berhasil tercopy!", "success");
        } catch (e) {
            console.log(e);
        }
    });

    $("img.svg").each((i, el) => {
        svgInline(el);
    });

    // product goto
    $(".btn-shop").click(function (e) {
        e.preventDefault();
        if (!$(this).data("link")) return;
        showTermCond($(this).data("link"));
    });
    window.showTermCond = function ($link, $footer = true) {
        let termModal = $("#term-cond-modal");
        termModal.modal();
        let termModalBody = termModal.find(".modal-body");
        let termTerm = termModal.find(".term-condition");

        if (!$footer) {
            termModal.find(".modal-footer").removeClass("d-block");
            termModal.find(".modal-footer").hide();
            return;
        }
        termModal.find(".modal-footer").addClass("d-block");
        termModal.find(".cancel").click(e => {
            termModal.modal("hide");
        });
        termModalBody.scroll(e => {
            let scrollBottom =
                termModalBody.scrollTop() +
                termModalBody.height() -
                termTerm[0].scrollHeight;
            if (scrollBottom == 0) {
                termModal.find(".accept-term").prop("disabled", false);
                termModal.find(".accept-term").click(e => {
                    termModal.find(".continue-term").prop("disabled", false);
                    termModal.find(".continue-term").click(function (e) {
                        window.open($link);
                    });
                });
            }
        });
        termModal.on("hidden.bs.modal", e => {
            termModal.find(".accept-term").prop("disabled", true);
            termModal.find(".accept-term").prop("checked", false);
            termModal.find(".continue-term").prop("disabled", true);
        });
        termModal.find(".continue-term").data("link", $(this).data("link"));
    };

    let img = $("img");
    img.each((i, el) => {
        $("<img/>")
            .on("error", e => {
                $(el).attr("src", "/img/no_image.png");
            })
            .attr("src", $(el).attr("src"));
    });
});
