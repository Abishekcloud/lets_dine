   /*================================================================================ */
   $.ajax({
    url: `${route_path}/api/v1/categories/getAllWithProducts`,
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    method: 'GET',
    dataType: 'json',
    async: 'true'
  })
    .then((data) => {

    //products
    const allCuisine = data.map((categories) => {
        return `
        <section class="sec_pd subcategory_header" id="${categories.id}">
        <div class="col-xxl-6 col-xl-6 col-lg-10 col-md-12 col-sm-12 m-auto m-auto mb-4">
          <div class="text-center animated fadeInUp">
            <div class="">
              <h1>${categories.name}</h1>
              <p class="main_head_sub_para mb-5">We recommend our Favourites for you</p>

      ${categories.subCategory.map((subcategory) => {
        const name = categories.name.split(" ")[0]
        const idname = subcategory.name.split(" ")[0] + "_" + name;
        let noLoad = subcategory.products.length<8?"no_load_more":"";
        return `
          </div>
          </div>
          </div>
          <div class="sub_item ${noLoad}">
          <h4 class="text-center mb-5 animated fadeInUp animated_delay sub_heading" style="padding-top:30px"  id="${idname}">${subcategory.name}</h4>
          <div class="special_menu_grid">


        ${subcategory.products.slice(0,8).map((product) => {
            const image = JSON.parse(product.image)
            const description = product.description.replace(/<\/?p>|<\/?b>|<\/?i>|<\/?h1>|<span> <\/span>/gi, '');

            return `
              <div class="special_one modalButton" data-name='Click_modalbtn_${categories.id}_${subcategory.id}_${product.id}' data-toggle='modal'>
                <div class="special_menu animated">
                <img src="${s3ImagePath}${image[0]}" alt="Special" class="menu_img img-fluid" />

                </div>
                <div class="menu_header">
                  <div class="menu_title">
                    <p class="menu_head">${product.name}</p>
                    <p class="menu_para ratings">

                    </p>
                  </div>
                  <div class="menu_desc">
                    <p class="menu_desc_list">${description}</p>
                  </div>
                  <div class="menu_title">
                    <p class="menu_head">${product.currency}${product.price}</p>
                    <p class="menu_para modal-icon">
                    <img src="${web_assets_path}/images/home/spacialmenu/info.png" class='info text-white' alt='info'/>
                    </p>
                  </div>
                  </div>

                  </div>


            `;
        }).join('')}
        `;
    }).join('')}
    </section>
    `;
    }).join('');

    $("#set_fmenu_list").append(allCuisine);
    $(".sub_item").append('<button class="load_more btn btn-default mt-4 common_btn common_btn_center" style="padding: 10px 20px;">Load more</button>');
    $('body').on('click','.load_more',function() {

      let subItemThis = $(this).closest('.sub_item'),
        myIdArr = subItemThis.find('.sub_heading').text(),
        myParent = subItemThis.find('.special_menu_grid'),
        catId = $(this).closest('.subcategory_header').attr('id'),proArr, subCatId;
        let myEleLen;
            for(let item of data) {
                let myEleId = item.id;
                if(catId==myEleId) {
                    let myEle = item.subCategory
                    myEleLen = myEle.length;
                    for(let myEl of myEle) {
                      subCatId=myEl.id;
                        if(myEl.name==myIdArr) {
                            proArr=myEl.products;
                        }
                    }
                }
            }
var myArr = [...proArr.slice(8,16)];
if (myArr.length<8) {
    subItemThis.find(".load_more").hide();
}

        let myTemplate = myArr.map(function(a) {
          let image = JSON.parse(a.image),
            description = a.description.replace(/<\/?p>|<\/?b>|<\/?i>|<\/?h1>|<span> <\/span>/gi, '');
            return `
            <div class="special_one modalButton " data-name='Click_modalbtn_${catId}_${subCatId}_${a.id}' data-toggle='modal'>
              <div class="special_menu">
              <img src="${s3ImagePath}${image[0]}" alt="Special" class="menu_img img-fluid" />
              </div>
              <div class="menu_header">
                <div class="menu_title">
                  <p class="menu_head">${a.name}</p>
                  <p class="menu_para ratings">
                  </p>
                </div>
                <div class="menu_desc">
                <p class="menu_desc_list">${description}</p>
                </div>
                <div class="menu_title">
                  <p class="menu_head">$${a.price}</p>
                  <p class="menu_para modal-icon">
                  <img src="${web_assets_path}/images/home/spacialmenu/info.png" class='info text-white' alt='info'/>
                  </p>
                </div>
                </div>
                </div>
          `;
        })
        myParent.append(myTemplate);
        myArr = [...proArr.splice(0,8)];
    });


    //sidebar
      const sidebar_menu = data.map((categories,index) => {
        const open = index === 0 ? "active" : "";
        const show = index === 0 ? "show" : "";

        return `
        <li class="nav-item drop_down ${open}" >
        <a data-bs-toggle="collapse" id="${categories.id}" data-bs-target="#collapse_${categories.id}_${categories.id}" href="#" aria-expanded="false" aria-controls="collapse_${categories.id}_${categories.id}" class="nav-link collapsed">
            <span> ${categories.name} </span>
            <span class="drop_arrow"></span>
        </a>
        <div class="collapse ${show} accordion-collapse collapse" id="collapse_${categories.id}_${categories.id}"  class="accordion-collapse collapse" aria-labelledby="${categories.id}" data-bs-parent="#accordionmenu">

        ${categories.subCategory.map((subcategory,subIndex) => {
            // const idname = subcategory.name.split(" ")[0];
            const name = categories.name.split(" ")[0]
            const idname = subcategory.name.split(" ")[0] + "_" + name;
            return`
                        <ul class="ul_sub">
                        <li class="nav-item">
                            <a class="nav-link menu_subcategory_title" href="#${idname}">${subcategory.name}</a>
                        </li>
                     </ul>
                    `;
                }).join('')}
                </div>
              </li>
              `;
          }).join('');

          $("#set_sidebarmenu").append(sidebar_menu);

          // sidebar menu active color
    var activeNavItem = $(".ul_main li.nav-item");
   activeNavItem.click(function () {
     activeNavItem.removeClass("active");
     $(this).addClass("active");
   });
   // submenu drop downmenu active
   var activesubNavItem = $(".ul_sub li.nav-item");
   activesubNavItem.click(function () {
     activesubNavItem.removeClass("submenu_active");
     $(this).addClass("submenu_active");
   });
   $(document).ready(function () {
     $(".ul_main").first("li").children("a").addClass("highlight");
     $(".menu_subcategory_title").eq(0).trigger("click");
   });
      })
    .fail((jqXHR, textStatus, errorThrown) => {
      console.log('Error: ' + textStatus + ' - ' + errorThrown);
    });


/*================================================================================ */
  //  mobile side drawer
  function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
  }
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
/*================================================================================ */
  // dynamic modal
  $(document).ready(function (e) {
    // Initializing our modal.
    $("#menudetails").modal({
      backdrop: "static",
      keyboard: false,
      show: false,
    });

    $(document).on("click", ".modalButton", function () {
      var ClickedButton = $(this).data("name");
      // You can make an ajax call here if you want.
      // Get the data and append it to a modal body.
      $("#menudetails").modal("show");
    });
  });
  /*================================================================================ */

// for currentactive menu items
  $('body').on('click','#set_sidebarmenu .menu_subcategory_title',function() {
    let myThis = $(this).attr('href').split('#')[1];
    $('.sec_pd.subcategory_header,.sub_item').css('display','none');
    $(`#${myThis}`).closest('.sec_pd.subcategory_header').css('display','block');
    $(`#${myThis}`).closest('.sub_item').css('display','block');
  });
