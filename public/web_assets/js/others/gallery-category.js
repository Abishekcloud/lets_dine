let response_data ;
$.ajax({
    url: `${route_path}/api/v1/gallery/withCaption`,
    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
    method: "GET",
    dataType: "json",
    async: "true",
})
    .then((data) => {
        response_data = data;
        let gallery_category = data
        .map((e, index) => {
            return `<button class="filter btn filter_btn" data-filter=".cat${e.id}">${capitalizeFirstLetter(e.category)}</button>`;
        })
        .join("");
    $("#gallery_category").append(
        `<button class="filter btn active filter_btn " data-filter="all">All</button>` +
            gallery_category
    );

        appendGalleryItems(data);
    })
    .fail((jqXHR, textStatus, errorThrown) => {
        console.error("Error: " + textStatus + " - " + errorThrown);
    });

function appendGalleryItems(data) {
    let gallery_sub_category = data
        .map((e, index) => {
            return e.gallery_category
                .map((cat) => {
                    return cat.images
                        .map((catImg) => {
                            return ` <div class="gal_cat cat${e.id} col-md-4 col-6" data-myorder="${cat.id}">
                                    <div class="party_status"> 
                                    <a href="${s3ImagePath}${catImg}" data-fancybox="images">
                                    <img src="${s3ImagePath}${catImg}" class="img-fluid filter_img_radius" alt="">
                                            <div class="party_details">
                                            <div class="party_name">${capitalizeFirstLetter(cat.caption)}</div>
                                            <div class="party_year">${cat.year}</div>
                                        </div>
                                        </a>
                                    </div>
                                    </div> `;
                        })
                        .join(" ");
                })
                .join(" ");
        })
        .join(" ");
    $("#set_filter_data").empty().append(gallery_sub_category);
    $(".gal_cat").addClass("zoomin-gallery");

    $('[data-fancybox="images"]').fancybox({
        baseClass: "myFancyBox",
        thumbs: {
            autoStart: true,
            axis: "x",
        },
    });
}

$(document).on("click", ".filter_btn", function (e) {
    var buttonText = e.target.innerText;
    $(".filter_btn").removeClass("active");
    $(this).addClass("active");
    let filterValue = $(this).data("filter");
    if(filterValue == 'all'){
        appendGalleryItems(response_data)
    }else{
        appendFilterData(buttonText, response_data);
    }
});


function appendFilterData(text, data) {
    let gallery_filter_category = data
        .map((e, index) => {
            return e.gallery_category
                .map((cat, index) => {
                    return cat.images
                        .map((catImg, index) => {
                            if( text == e.category ){
                                let return_data;
                                if( index == 0){
                                    return_data = ` <div class="gal_cat cat${e.id} col-md-4 col-6" data-myorder="${cat.id}">
                                    <div class="party_status"> 
                                    <a href="${s3ImagePath}${catImg}" data-fancybox="cat${cat.id}" >
                                    <img src="${s3ImagePath}${catImg}" class="img-fluid filter_img_radius" alt="" onClick="return fancyOnClick('cat${cat.id}')">
                                            <div class="party_details">
                                            <div class="party_name">${capitalizeFirstLetter(cat.caption)}</div>
                                            <div class="party_year">${cat.year}</div>
                                        </div>
                                        </a>
                                    </div>
                                    </div> `;
                                }else{
                                    return_data =  ` <div class="gal_cat cat${e.id} col-md-4 col-6" data-myorder="${cat.id}" style="display: none;" >
                                    <div class="party_status"> 
                                    <a href="${s3ImagePath}${catImg}" data-fancybox="cat${cat.id}" >
                                    <img src="${s3ImagePath}${catImg}" class="img-fluid filter_img_radius" alt="">
                                            <div class="party_details">
                                            <div class="party_name">${capitalizeFirstLetter(cat.caption)}</div>
                                            <div class="party_year">${cat.year}</div>
                                        </div>
                                        </a>
                                    </div>
                                    </div> `;
                                }
                                return return_data;
                            }
                        })
                        .join(" ");
                })
                .join(" ");
        })
        .join(" ");
    $("#set_filter_data").empty().append(gallery_filter_category);
    $(".gal_cat").removeClass("zoomin-gallery");
}
function capitalizeFirstLetter(str) {
    if (!str) {
        return str;
    }
    return str.charAt(0).toUpperCase() + str.slice(1);
}

function fancyOnClick(catName) {
    $('[data-fancybox="'+catName+'"]').fancybox({
        baseClass: "myFancyBox",
        thumbs: {
            autoStart: true,
            axis: "x",
        },
    });
}
