/* fastbreak theme menu script @ver 1.0.0 */
	function handleClick() {
        const targetDiv = document.getElementById('togmenu');
        if (targetDiv.style.display !== "flex") {

            targetDiv.style.display = "flex";
        } else {

        targetDiv.style.display = "none";
        }
    }

    window.addEventListener("resize", () => {
    const width = window.innerWidth;
    const targetDiv = document.getElementById('togmenu');
    if ( width > 1160 ){
        targetDiv.style.display = "flex";
    }
    }); 
 