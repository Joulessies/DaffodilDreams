<style>
* {
    padding: 0;
    margin: 0;
    list-style: none;
    text-decoration: none;
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

nav {
    background-color: #f2f2f2;
    border-bottom: 1px solid black;
    position: sticky;
    z-index: 1000;
    top: 0;
}

.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 90px;
    padding: 0 20px;
    width: 100%;
}


.nav-links {
    display: flex;
    gap: 20px;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
}

.nav-links ul {
    display: flex;
    gap: 25px;
    justify-content: center;
    margin: 0;
}

.nav-links li {
    display: inline-block;
}


.nav-icons {
    display: flex;
    gap: 10px;
    align-items: center;
}
</style>