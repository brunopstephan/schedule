const openLogin = document.getElementById("openLogin")
const closeLogin = document.getElementById("closeLogin")
const login = document.getElementById("login")
const inithour = document.getElementById("inithour")
const endhour = document.getElementById("endhour")


if(openLogin != null){
    openLogin.addEventListener("click", () => {
            login.style.display = "flex"
            login.style.flexDirection = "column"
            login.style.alignItems = "center"
        })
        
        closeLogin.addEventListener("click", () => {
            login.style.display = "none"
        })
        
        window.addEventListener("load", () => {
            login.style.display = "none"
        })
}

if(inithour != null){
    ops = [];

    for (let i = 0; i < endhour.options.length - 1; i++) {
        ops.push(i);
        
    }

    inithour.addEventListener("change", () => {
        for(let x in ops){
            if(ops[x] <= inithour.value){
                endhour.options[ops[x] + 1].disabled = true
            }
        } 
    })

}

