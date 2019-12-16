// JSON in JS
var json_chord = "{\n" +
    "  \"guitar\": {\n" +
    "    \"DO\": {\n" +
    "      \"chord\":  \"01023X\",\n" +
    "      \"finger\": \"X1X23X\",\n" +
    "      \"root\": \"0\",\n" +
    "      \"fret\": 0\n" +
    "    },\n" +
    "    \"DOm\": {\n" +
    "      \"chord\":  \"04550X\",\n" +
    "      \"finger\": \"X243XX\",\n" +
    "      \"root\": \"35\",\n" +
    "      \"fret\": 0\n" +
    "    },\n" +
    "    \"RE\": {\n" +
    "      \"chord\":  \"2320XX\",\n" +
    "      \"finger\": \"231XXX\",\n" +
    "      \"root\": \"0\",\n" +
    "      \"fret\": 0\n" +
    "    },\n" +
    "    \"RE\": {\n" +
    "      \"chord\":  \"2320XX\",\n" +
    "      \"finger\": \"231XXX\",\n" +
    "      \"root\": \"0\",\n" +
    "      \"fret\": 0\n" +
    "    }\n" +
    "  },\n" +
    "  \"piano\": [\n" +
    "    {\n" +
    "      \"DO\": {\n" +
    "      }\n" +
    "    }\n" +
    "  ]\n" +
    "}\n"
let chords = document.querySelectorAll('span[class=chord]');
for (let i = 0; i < chords.length; i++) {
    chords[i].addEventListener("mouseover", function (event) {
        generateChord(event.target);
    });
}

function dragElement(elmnt, header) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    if (header) {
        // if present, the header is where you move the DIV from:
        header.onmousedown = dragMouseDown;
        header.ondblclick = closeChord;
    } else {
        // otherwise, move the DIV from anywhere inside the DIV:
        elmnt.onmousedown = dragMouseDown;
    }

    function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        // get the mouse cursor position at startup:
        pos3 = e.clientX;
        pos4 = e.clientY;
        document.onmouseup = closeDragElement;
        // call a function whenever the cursor moves:
        document.onmousemove = elementDrag;
    }

    function elementDrag(e) {
        e = e || window.event;
        e.preventDefault();
        // calculate the new cursor position:
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        // set the element's new position:
        elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
        elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
    }

    function closeDragElement() {
        // stop moving when mouse button is released:
        document.onmouseup = null;
        document.onmousemove = null;
    }

    function closeChord() {
        elmnt.parentElement.removeChild(elmnt);
    }
}


//quick and dirty DFS children traversal,
function traverseChildren(elem) {
    var children = [];
    var q = [];
    q.push(elem);
    while (q.length > 0) {
        var elem = q.pop();
        children.push(elem);
        pushAll(elem.children);
    }

    function pushAll(elemArray) {
        for (var i = 0; i < elemArray.length; i++) {
            q.push(elemArray[i]);
        }
    }

    return children;
}

function makeMouseOutFn(elem, chord) {
    var list = traverseChildren(elem);
    return function onMouseOut(event) {
        console.log("Out")

        var e = event.toElement || event.relatedTarget;
        if (!!~list.indexOf(e) || chord.style.top !== '') {
            return;
        }
        elem.removeChild(chord);

    };
}

function generateChord(element) {
    if (element.className === 'chord' && element.children.length === 0) {
        let str_chord = element.innerText;

        let chord = document.createElement("div");
        chord.className += 'chord-container';

        let draggable_chord_header = document.createElement("div");
        draggable_chord_header.className += ' chordheader';
        draggable_chord_header.innerText = str_chord;
        chord.appendChild(draggable_chord_header);

        let ch_bg = document.createElement("img");
        ch_bg.src = "assets/chord.svg";
        chord.appendChild(ch_bg);

        let fret_chord = document.createElement("div");
        fret_chord.className += ' fret-chord';
        chord.appendChild(fret_chord);

        let hover_chord = document.createElement("div");
        hover_chord.className += ' hover-chord';
        chord.appendChild(hover_chord);

        element.appendChild(chord);


        var results = JSON.parse(json_chord);
        fret_chord.innerText = results.guitar[str_chord].fret === 0 ? '' : results.guitar[str_chord].fret.toString() + ' fret';
        let chord_ch = results.guitar[str_chord].chord.toString().split('');
        let finger_ch = results.guitar[str_chord].finger.toString().split('');
        if (results.guitar[str_chord].root.toString() !== '0') {
            let ch_root = results.guitar[str_chord].root.toString().split('');
            let chord_string = document.createElement("div");
            chord_string.className += ' fret-root' + ' fr-' + ch_root[0] + ' r-' + ch_root[1];
            hover_chord.appendChild(chord_string);

        }

        for (i = 0; i < chord_ch.length; i++) {
            let chord_string = document.createElement("div");
            if (chord_ch[i] === '0') continue;
            if (chord_ch[i] === 'X') {
                chord_string.className += ' fret-ics' + ' ch-' + (i + 1);
                hover_chord.appendChild(chord_string);
                continue;
            }
            chord_string.className += ' fret-finger' + ' ch-' + (i + 1) + ' fr-' + chord_ch[i];
            chord_string.innerText = finger_ch[i];
            hover_chord.appendChild(chord_string);
        }
        element.addEventListener('mouseout', makeMouseOutFn(element, chord), true);
        dragElement(chord, draggable_chord_header);
    }


}
