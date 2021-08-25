
window.addEventListener("scroll", function () {
    const header = document.querySelector('#nav');
    let scrollPosition = window.scrollY;
    let headerHeight = header.offsetHeight * 1.2;

    if (scrollPosition > headerHeight) {
        header.classList.add('nav-active')
    } else {
        header.classList.remove('nav-active')
    }
});