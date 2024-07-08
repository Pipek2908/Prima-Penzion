const poleOdkazu = document.querySelectorAll(".mazaci-odkaz");

for (const odkaz of poleOdkazu) {
    odkaz.addEventListener("click", (udalost) => {
        //odkaz je dekativovany
        udalost.preventDefault();

        const odpoved = confirm("Opravdu chcete stranku smazat?");
        
        if (odpoved) {
            const cilOdkazu = odkaz.getAttribute("href");
            window.location.href = cilOdkazu;
        }
    });
}


//razeni stranek
$("#seznam-stranek").sortable({
    update: () => {
        console.log("posilam ajax formular na server");

        const poleId = $("#seznam-stranek").sortable("toArray");
        console.log(poleId);

        $.ajax({
            type: "post",
            url: "./admin.php",
            data: {
                poleId: poleId,
                razeniSubmit: true
            },
            dataType: "json",
            success: (odpovedServeru) => {
                console.log(odpovedServeru)
            }
        });
    }
});