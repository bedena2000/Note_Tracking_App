import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    if (window.shouldOpenModal) {
        newFolderModal.classList.toggle("hidden");
    }
});

const newNoteItem = document.getElementById("new_note_item");
const createFolderItem = document.getElementById("create_folder_item");
const newFolderModal = document.getElementById("new_folder_modal");
const blackBackgroundFolderCreate = document.getElementById(
    "black_background_for_folder_create_modal"
);
const folderCreateCancelButton = document.getElementById(
    "folder_create_cancel_button"
);
const folderCreateInput = document.getElementById("create_folder_name_input");

newNoteItem.addEventListener("click", handleModel);
createFolderItem.addEventListener("click", handleNewFolder);
folderCreateCancelButton.addEventListener("click", handleNewFolder);
blackBackgroundFolderCreate.addEventListener("click", handleNewFolder);

function handleModel() {}

function handleNewFolder() {
    newFolderModal.classList.toggle("hidden");
}
