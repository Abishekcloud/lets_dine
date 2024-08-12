   /*================================================================================ */
   $.ajax({
    url: `${route_path}/api/v1/categories/products_for_specialmenu`,
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    method: 'GET',
    dataType: 'json',
    async: 'true'
  })
    .then((data) => {

        let specialMenu = data.map((product) => {
            const description = product.description.replace(/<\/?p>|<\/?b>|<\/?i>|<\/?h1>|<span> <\/span>/gi, '');

            return `
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="special_one">
                        <div class="offer_per">
                        <img src="${root_path}/images/home/spacialmenu/offerbadge.png"
                                class="sp_img" alt="Special" />
                            <div class="offer_tag">
                                <p class="offer_percent"> 25 <sub>%</sub>
                                </p>
                                <p class="offer_percent1">Off</p>
                            </div>
                        </div>
                        <div class="special_menu">
                            <img src="${s3ImagePath}${product.image}" alt="Special"
                                class="menu_img" />
                        </div>
                        <div class="menu_header">
                            <div class="menu_title">
                                <p class="menu_head">${product.name}</p>
                                <p class="menu_para ratings"> 4.5</p>
                            </div>
                            <div class="menu_desc">
                                <p class="menu_desc_list">${description}</p>
                            </div>
                            <div class="menu_title">
                                <p class="menu_head">${product.currency}${product.price}</p>
                                <p class="menu_para ">
                                    <img src="${root_path}/images/home/spacialmenu/info.png"                                        class="info splmenu_info_icon info_n_close_btn" alt="info" />
                                </p>
                            </div>
                        </div>
                        <div class="splmenu_info" style=" ">
                            <button type="button" class=" btn info_n_close_btn" id="spl_menuinfo_close"
                                aria-label="Close">✕</button>
                            <div>
                                <h6 class="spl_title">Ingredients</h6>
                                <p class="spl_disc ingreients_elips"> Pepperoni is an American variety of spicy salami made
                                    from cured pork </p>
                                <h6 class="disc_title mt-4">Cooking techniques</h6>
                                <p class="spl_disc techniques_elips"> Pepperoni is an American variety of spicy salami made
                                    from cured pork Pepperoni is an American variety of spicy salami made from cured pork
                                    Pepperoni is an American variety of spicy salami made from cured pork Pepper°n is an
                                    American variety of spicy salami made from cured pork Pepperoni is an American variety
                                    of spicy salami mode from cured Pepperoni is an American variety of spicy salami made
                                    from cured </p>
                            </div>
                        </div>
                    </div>
                </div> `
            ;
    }).join('');

    $(".special_menu1").append(specialMenu);

        })
            .fail((jqXHR, textStatus, errorThrown) => {
        console.log('Error: ' + textStatus + ' - ' + errorThrown);
      });




