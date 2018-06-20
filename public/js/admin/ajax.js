
window.onload = function(){
    delete_ajax('.delete_row');
}


function delete_ajax(search_tag){

    var delete_row = $(search_tag);


    delete_row.click(function (e){
        e.preventDefault();

        var request = $(this).attr('href');
        console.log(request);

        var page = url_get_page(request);


        var my_data = {
            'page' : page,
        };


        $.ajax({
            url: request,
            type: 'GET',
            data: my_data,
            error: function (err) {
                console.log(err);
            },
            success: function (res) {

                insert('#table_body', res);
                delete_ajax('.delete_row');

            },


        });

});

}



function insert(tag, html){
    $(tag).html(html);
}


function url_get_page(url){


    var url_str = url ? url : window.location.href;
    var search_str = url.split('?');

    var regex_page = /page=([0-9]+)$/g;
    var page = regex_page.exec(search_str) ? page[1] : 1;


    return page;
}

function show_popup(){

}
