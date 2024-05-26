document.addEventListener('DOMContentLoaded', () => {
    const photoInput = document.getElementById("photo");
    const image = document.querySelector("figure#image img.cursor-pointer");

    image.addEventListener('click', () => {
        photoInput.classList.remove('hidden');
        image.classList.add('hidden');
    });
});
