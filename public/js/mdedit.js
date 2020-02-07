

var mde = new SimpleMDE({
 element: document.getElementById("mde"),
});

// ウィンドウ全域でD&D禁止
addEventListener("dragover", (event)=>{
    event.preventDefault();
    event.dataTransfer.dropEffect = "none";
});
addEventListener("drop", (event)=>{
    event.preventDefault();
});

const dnd = document.getElementsByClassName("CodeMirror-scroll")[0];
// エディタ領域のみD&D許可
dnd.addEventListener("dragover", (event)=>{
    event.preventDefault();
    event.dataTransfer.dropEffect = "move";
});
dnd.addEventListener("drop", async(event)=>{
 console.log("TEST dropped");
 console.log(event.dataTransfer.files[0]);
 event.preventDefault();
 mde.value(await fileReader(event.dataTransfer.files[0]));
 mde.codemirror.focus();
});

// ここら辺はお好みで
function fileReader(blob){
    return new Promise((res, rej)=>{
        const fr = new FileReader();
        fr.addEventListener("load", () => res(fr.result));
        fr.addEventListener("error", () => rej(fr.error));
        fr.readAsText(blob);
    });
}



// Toolbar アクションハンドラ
async function loadHandler(editor){
    editor.value(await filePicker().then(b => fileReader(b)));
    editor.codemirror.focus();
}

function filePicker(){
    return new Promise((res)=>{
        const input = document.createElement("input");
        input.type = "file";
        input.id = "file";
        input.style.display = "none";
        document.body.appendChild(input);

        const file = document.getElementById("file");

        file.addEventListener("change", function fn(event){
            input.removeEventListener("change", fn);
            document.body.removeChild(file);

            res(event.target.files[0]);
        });

        file.click();
    });
}