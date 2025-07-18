import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    if (window.shouldOpenModal) {
        newFolderModal.classList.toggle("hidden");
    }

    if (window.shouldOpenNoteModal) {
        noteCreateModal.classList.toggle("hidden");
    }
});

const newNoteItem = document.getElementById("new_note_item");
const createFolderItem = document.getElementById("create_folder_item");
const noteCancelButton = document.getElementById("note_create_cancel_button");
const noteBackgroundModal = document.getElementById("note_modal_background");
const newFolderModal = document.getElementById("new_folder_modal");
const noteCreateModal = document.getElementById("new_note_modal");
const blackBackgroundFolderCreate = document.getElementById(
    "black_background_for_folder_create_modal"
);
const folderCreateCancelButton = document.getElementById(
    "folder_create_cancel_button"
);
const folderCreateInput = document.getElementById("create_folder_name_input");
const noteCreateButton = document.getElementById("note_create");
const htmlHiddenContent = document.getElementById("editor_hidden_content");
const editorModalMenu = document.getElementById("editor_modal_menu");
const editorMenuButton = document.getElementById("editor_menu_button");
const noteEditor = document.getElementById("note_editor");
const hiddenNoteContent = document.getElementById("hidden_note_editor_content");
const noteItem = document.getElementById("note_item");
const noteEditorModal = document.getElementById("note_editor_modal");

createFolderItem.addEventListener("click", handleNewFolder);
folderCreateCancelButton.addEventListener("click", handleNewFolder);
blackBackgroundFolderCreate.addEventListener("click", handleNewFolder);
newNoteItem.addEventListener("click", handleNoteCreate);
noteCancelButton.addEventListener("click", handleNoteCreate);
noteBackgroundModal.addEventListener("click", handleNoteCreate);

noteItem.addEventListener('click', function () {
    noteEditorModal.classList.toggle("hidden");
});


function handleModel() {}

function handleNewFolder() {
    newFolderModal.classList.toggle("hidden");
}

function handleNoteCreate() {
    noteCreateModal.classList.toggle("hidden");
}

const quill = new Quill("#editor", {
    theme: "snow",
    placeholder: "Enter a description of note",
});

const note_quill = new Quill("#note_editor", {
    theme: "snow",
    placeholder: "Enter a description of note",
});

const form = document.querySelector("form");
const hiddenInput = document.querySelector("#note_content");

quill.on("text-change", function () {
    htmlHiddenContent.value = quill.getSemanticHTML();
    hiddenInput.value = quill.root.innerHTML;
});

note_quill.on('text-change', function () {
    hiddenNoteContent.value = note_quill.getSemanticHTML(); 
});

editorMenuButton.addEventListener('click', () => {
    editorModalMenu.classList.toggle('hidden');
});
