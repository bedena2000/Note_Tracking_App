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
    "black_background_for_folder_create_modal",
);
const folderCreateCancelButton = document.getElementById(
    "folder_create_cancel_button",
);
const folderCreateInput = document.getElementById("create_folder_name_input");
const noteCreateButton = document.getElementById("note_create");
const htmlHiddenContent = document.getElementById("editor_hidden_content");
const editorModalMenu = document.getElementById("editor_modal_menu");
const editorMenuButton = document.getElementById("editor_menu_button");
const noteEditor = document.getElementById("note_editor");
const hiddenNoteContent = document.getElementById("hidden_note_editor_content");
const noteItems = document.getElementsByClassName("noteItem");
const noteEditorModal = document.getElementById("note_editor_modal");
const noteEditorCloseButton = document.getElementById(
    "note_edotor_close_button",
);
const noteTitleItem = document.querySelector(".noteTitle");
const noteCreatedAtItem = document.querySelector(".noteCreatedAt");
const noteCurrentFolder = document.querySelector(".noteCurrentFolder");

createFolderItem.addEventListener("click", handleNewFolder);
folderCreateCancelButton.addEventListener("click", handleNewFolder);
blackBackgroundFolderCreate.addEventListener("click", handleNewFolder);
newNoteItem.addEventListener("click", handleNoteCreate);
noteCancelButton.addEventListener("click", handleNoteCreate);
noteBackgroundModal.addEventListener("click", handleNoteCreate);

if (noteItems) {
    for (let i = 0; i < noteItems.length; i++) {
        noteItems[i].addEventListener("click", () => {
            noteEditorModal.classList.toggle("hidden");
            const inputItem = noteItems[i].querySelector(
                "input[type='hidden']",
            );
            const noteId = inputItem.dataset["note_item_id"];
            const folderId = inputItem.dataset["note_item_folder_id"];
            const noteContent = inputItem.dataset["note_content"];
            const noteTitle = inputItem.dataset["note_title"];
            const noteCreatedAt = inputItem.dataset["note_created_at"];
            const currentFolder = inputItem.dataset["current_folder"];
            generateNoteEditorContent(
                noteId,
                folderId,
                noteContent,
                noteTitle,
                noteCreatedAt,
                currentFolder,
            );
        });
    }
}

if (noteEditorCloseButton) {
    noteEditorCloseButton.addEventListener("click", function () {
        noteEditorModal.classList.toggle("hidden");
    });
}

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
});

note_quill.on("text-change", function () {
    hiddenNoteContent.value = note_quill.getSemanticHTML();
});

editorMenuButton.addEventListener("click", () => {
    editorModalMenu.classList.toggle("hidden");
});

function generateNoteEditorContent(
    noteId,
    folderId,
    noteContent = "",
    noteTitle,
    noteCreatedAt,
    currentFolder,
) {
    if (!noteEditorModal.classList.contains("hidden")) {
        document.getElementById("note_editor_modal_note_id_name").value =
            noteId;
        document.getElementById("note_editor_modal_note_folder_id_name").value =
            folderId;
        quill.setText(noteContent);
        noteTitleItem.textContent = noteTitle;
        noteCreatedAtItem.textContent = noteCreatedAt.split(" ")[0];
        noteCurrentFolder.textContent = currentFolder;
    }
}
