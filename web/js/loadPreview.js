const loadPreview = () => {
    const selectedFile = document.getElementById('users-imagefile').files[0];
    document.getElementById('previewPhoto').src = URL.createObjectURL(selectedFile);
}