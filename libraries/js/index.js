const scrollLink = document.querySelector(".scroll-link");

/*
==================
Fixed Navigation
==================
*/

const navBar = document.querySelector(".navigation");
const gotoTop = document.querySelector(".goto_top");

//Smooth Scroll
Array.from(scrollLink).map(link => {
    link.addEventListener("click", e => {
        //Prevent Default
        e.preventDefault();

        const id = e.currentTarget.getAttribute("href").slice(1);
        const element = document.getElementById(id);
        const navHeight = navBar.getBoundingClientRect().height;
        const fixNav = navBar.classList.contains("fix_nav");
        let position = elemnt.offsetTop - navHeight;

        if (!fixNav) {
            position = position - navHeight;
        }

        window.scrollTo({
            left: 0,
            top: position,
        });
        navContainer.style.left = "-30rem";
        document.body.classList.remove("active");
    });
});

// Fix NavBar

window.addEventListener("scroll", e => {
    const scrollHeight = window.pageYOffset;
    const navHeight = navBar.getBoundingClientRect().height;
    if (scrollHeight > navHeight) {
        navBar.classList.add("fix_nav");
    } else {
        navBar.classList.remove("fix_nav");
    }

    if (scrollHeight > 300) {
        gotoTop.classList.add("show-top");
    } else {
        gotoTop.classList.remove("show-top");
    }
});