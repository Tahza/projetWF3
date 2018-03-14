$(".edit img").memeGenerator({
    useBootstrap: true,
    layout: "horizontal",
    previewMode: "canvas"
});

$("#save").click(function(e){
    e.preventDefault();

    var previewImage = $("#meme").memeGenerator("save");

    $("#preview").html(
        $("<img>").attr("src", previewImage )
    );
});


$.fn.memeGenerator("i18n", "pl", {
    topTextPlaceholder: "Text haut",
    bottomTextPlaceholder: "Texte bas",

    addTextbox: "Ajouter un champ texte",
    toolbox: "Outils",

    drawingStart: "Dessiner",
    drawingStop: "Stop Dessin",
    drawingErase: "Effacer"
});