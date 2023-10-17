function showResults(resultsQuery, lyricsQuery) 
{
    if (resultsQuery == "" || lyricsQuery == "") {
        document.getElementById("song-results").innerHTML = "";
        return;
    }
    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("song-results").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","load-results.php?resultsQuery="+resultsQuery+"&lyricsQuery="+lyricsQuery,true);
        xmlhttp.send();
    }
}

function showLyrics(songID) 
{
    if (songID == "") {
        document.getElementById("song-info").innerHTML = "";
        return;
    }
    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("song-info").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","load-song.php?songID="+songID,true);
        xmlhttp.send();

        var xmlhttp2 = new XMLHttpRequest();
        xmlhttp2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("song-lyrics").innerHTML = this.responseText;
            }
        };
        xmlhttp2.open("GET","load-lyrics.php?songID="+songID,true);
        xmlhttp2.send();
    }
}

function genreSelectCheck(nameSelect)
{
    console.log(nameSelect);
    if(nameSelect){
        otherGenreValue = 0;
        if(otherGenreValue == nameSelect.value) {
            document.getElementById("otherGenreDiv").style.display = "block";
            document.getElementById("other_genre").setAttribute("required","");
        }
        else {
            document.getElementById("otherGenreDiv").style.display = "none";
        }
    }
    else {
        document.getElementById("otherGenreDiv").style.display = "none";
    }
}