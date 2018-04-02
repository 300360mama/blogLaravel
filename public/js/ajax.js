$('document').ready(function(){



    var searchArticle = $('#searchArticle');
    var searchData = $('#searchArticle .search');

    searchArticle.submit(function (e){
        e.preventDefault();


        $.ajax({
            url: 'home/searchArticle',
            type: 'POST',
            data: searchData.serialize(),
            error: function (err) {
                console.log(err);
            },
            success: function (data) {
                console.log(data)
            },


        });

    });



});



