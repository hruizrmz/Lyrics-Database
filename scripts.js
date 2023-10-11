function genreSelectCheck(nameSelect)
{
    console.log(nameSelect);
    if(nameSelect){
        otherGenreValue = 0;
        if(otherGenreValue == nameSelect.value){
            document.getElementById("otherGenreDiv").style.display = "block";
            document.getElementById("other_genre").attr("required");
        }
        else{
            document.getElementById("otherGenreDiv").style.display = "none";
        }
    }
    else{
        document.getElementById("otherGenreDiv").style.display = "none";
    }
}