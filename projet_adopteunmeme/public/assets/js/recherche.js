$(document).ready(function() {
    $('#search').keyup(function () {
        var searchField = $('#search').val();
        $('#result').empty();
        $.getJSON('https://api.imgflip.com/get_memes', function (data) {
            $('.resultat').empty();
            var memes = data.data.memes;
            console.log(memes);
            $.each(memes, function (index, meme) {
                if (meme.name.toLowerCase().indexOf(searchField.toLowerCase()) > -1) {
                    console.log(meme);
                    $('#result').append('<a id="lien" href="edit/' + (meme.id) + '"> <li class="list-group-item-action">' +
                        '<img id="lienimg" src="' + (meme.url) + '" ' +
                        'height="80" width="80" ' +
                        'class="img-thumbnail"> '+ meme.name +' </a></li> ');
                }
            });
        });
    });
});