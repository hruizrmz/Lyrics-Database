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

// https://www.w3schools.com/php/php_ajax_database.asp
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

// https://stackoverflow.com/a/9733420
function luminance(r, g, b) {
    const RED = 0.2126;
    const GREEN = 0.7152;
    const BLUE = 0.0722;
    const GAMMA = 2.4;
    var a = [r, g, b].map((v) => {
        v /= 255;
        return v <= 0.03928
        ? v / 12.92
        : Math.pow((v + 0.055) / 1.055, GAMMA);
    });
    return a[0] * RED + a[1] * GREEN + a[2] * BLUE;
}
function contrast(rgb1, rgb2) {
    var lum1 = luminance(...rgb1);
    var lum2 = luminance(...rgb2);
    var brightest = Math.max(lum1, lum2);
    var darkest = Math.min(lum1, lum2);
    return (brightest + 0.05) / (darkest + 0.05);
}

// https://lokeshdhakar.com/projects/color-thief/
// https://dev.to/mcanam/how-to-make-adaptive-card-color-depending-on-image-background-555b
function setBGColor() {
    const colorThief = new ColorThief();
    const img = document.querySelector("img");

    palette = [];
    if (img.complete) {
        palette = colorThief.getPalette(img);
    }
    else {
        img.addEventListener('load', function() {
            palette = colorThief.getPalette(img,2);
        });
    }

    const color1 = palette[0];
    const color2 = palette[1];

    if (contrast(color1,color2) >= 4) {
        document.getElementById("song-lyrics").style.backgroundColor = `rgb(${color1})`;
        document.getElementById("song-lyrics").style.color = `rgb(${color2})`;

        document.getElementById("song-info").style.backgroundColor = `rgb(${color1})`;
        document.getElementById("song-info").style.color = `rgb(${color2})`;
    }
    else {
        const white = [255, 255, 255];
        const black = [0, 0, 0];

        if (contrast(white,color1) >= 4) {
            document.getElementById("song-lyrics").style.backgroundColor = `rgb(${color1})`;
            document.getElementById("song-lyrics").style.color = `rgb(${white})`;

            document.getElementById("song-info").style.backgroundColor = `rgb(${color1})`;
            document.getElementById("song-info").style.color = `rgb(${white})`;
        }
        else {
            document.getElementById("song-lyrics").style.backgroundColor = `rgb(${color1})`;
            document.getElementById("song-lyrics").style.color = `rgb(${black})`;

            document.getElementById("song-info").style.backgroundColor = `rgb(${color1})`;
            document.getElementById("song-info").style.color = `rgb(${black})`;
        }
    }
}