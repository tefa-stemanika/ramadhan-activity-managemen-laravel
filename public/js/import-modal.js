const toggleImportModal = () => {
    document.getElementById("importModal").classList.toggle("hidden");
    const advanceDeleteModal = document.getElementById("advance_delete_modal");
    const insertModal = document.getElementById("insert_modal");
    const generateModal = document.getElementById("generate_modal");

    if (advanceDeleteModal) {
        advanceDeleteModal.classList.add("hidden");
    }

    if (insertModal) {
        insertModal.classList.add("hidden");
    }

    if (generateModal) {
        generateModal.classList.add("hidden");
    }
};

function displaySelectedFileName(event) {
    // Dapatkan elemen input file
    var inputFile = event.target;

    // Pastikan ada file yang dipilih
    if (inputFile.files.length > 0) {
        const displayName = inputFile.files[0].name;
        document.getElementById("submitButton").classList.toggle("hidden");
        document.getElementById("displayName").innerText = displayName;
    } else {
        document.getElementById("submitButton").classList.toggle("hidden");
        document.getElementById("displayName").innerText = "About";
    }
}
