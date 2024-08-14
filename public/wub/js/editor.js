document.addEventListener('DOMContentLoaded', function() {
    const mediaUpload = document.getElementById('mediaUpload');
    const descriptionDiv = document.getElementById('materialDescription');

    mediaUpload.addEventListener('change', function(event) {
        const files = event.target.files;

        // Clear existing content in the description div
        // descriptionDiv.innerHTML = ''; // Uncomment this line if you want to clear old media each time new files are uploaded

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const fileURL = e.target.result;
                let mediaElement;

                if (file.type.startsWith('image/')) {
                    mediaElement = `<img src="${fileURL}" alt="Image" style="max-width: 100%; height: auto; display: block; margin-bottom: 10px;">`;
                } else if (file.type.startsWith('video/')) {
                    mediaElement = `<video controls style="max-width: 100%; height: auto; display: block; margin-bottom: 10px;">
                                       <source src="${fileURL}" type="${file.type}">
                                       Your browser does not support the video tag.
                                    </video>`;
                }

                // Insert the media element into the contenteditable div
                descriptionDiv.innerHTML += mediaElement;
            };

            reader.readAsDataURL(file);
        }
    });
});
