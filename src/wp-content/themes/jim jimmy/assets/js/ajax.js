jQuery(document).ready(function($) {
    ///
    // $('.button--load-more').click(load_more_ajax_work);
    $('.gallery--main-nav-menu li').click(cat_post_gallery_ajax);
    // slick get id post gallery
    $('.gallery--cont-image').click(cat_popup_gallery_ajax);
});
// //
// var blogLoading= false;
// function load_more_ajax_work(){
//     if(blogLoading == false){
//         blogLoading = true;
//         let input = jQuery('.button--load-more'),
//         data_page = input.attr('data-page'),
//         data_limit = input.attr('data-limit');
//         $.ajax({
//             type : "post",
//             url : ajaxUrl,
//             // url :ajax_var.url,
//             data : {
//                 action: "loading_work",
//                 data_page: data_page,
//                 data_limit: data_limit
//             },
//             beforeSend: function(){
//                 // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
//         },
//         success: function(response) {
//                 //Làm gì đó khi dữ liệu đã được xử lý
//                 $('.our-work--body .row').append(response);

//         },
//         complete: function() {
//             blogLoading = false;
//         },
//         error: function( jqXHR, textStatus, errorThrown ){
//                 //Làm gì đó khi có lỗi xảy ra
//                 console.log( 'The following error occured: ' + textStatus, errorThrown );
//         }
//         });
//     }

// }
function cat_post_gallery_ajax(){
    let data_term = $(this).attr('data-term');
    $.ajax({
        type : 'post',
        url : ajaxUrl,
        data : {
            action: 'fill_by_cat_gallery',
            data_term: data_term
        },
        beforeSend: function(){
        },
        success: function(response) {
            $('.gallery--content-group .row').html(response);
        },
        error: function( jqXHR, textStatus, errorThrown ){
            console.log( 'The following error occured: ' + textStatus, errorThrown );
        }
    });
}
// Ajax popup
function cat_popup_gallery_ajax(){
    let get_id = $(this).attr("data-post_id");
    let get_slug = $(this).attr("data-slug");
    console.log(get_slug);
    $('.popup_ajax').addClass('show_popup');
    $.ajax({
        type : 'post',
        url : ajaxUrl,
        data : {
            action: 'fill_by_popup_gallery',
            get_id: get_id,
            get_slug: get_slug
        },
        beforeSend: function(){
        },
        success: function(response) {
            $('.popup_ajax').html(response);
            console.log(response);
        },
        error: function( jqXHR, textStatus, errorThrown ){
            console.log( 'The following error occured: ' + textStatus, errorThrown );
        }
    });
}