const auto_div = document.querySelector("#auto_div");
const manual_div = document.querySelector("#manual_div");

// passport fields
const passport_fields = {
    name: document.querySelector("#name"),
    nickname: document.querySelector("#nickname"),
    passport_number: document.querySelector("#passport_number"),
    birth_date: document.querySelector("#birth_date"),
    gender: document.querySelector("#gender"),
    nation: document.querySelector("#nation"),
    passport_expire_date: document.querySelector("#passport_expire_date"),
    issuing_authority: document.querySelector("#issuing_authority"),
};

const uploadImage = (e) => {
    const file = document.getElementById("img").files[0];

    const url = URL.createObjectURL(file);
    const img = document.getElementById("image");
    img.setAttribute("src", url);
    console.log(img);
};

const information = document.getElementById("information");

information.addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (e.target.files[0]) {
        const reader = new FileReader();
        reader.readAsText(file, "UTF-8");
        reader.onload = (e) => {
            content = e.target.result;
            const lines = content.split("\r");

            // 1
            const match = lines[0].match(
                /^P<([A-Z]+)<<([A-Z]+)<([A-Z]+)<([A-Z]+)/
            );

            if (match) {
                const surname = match[1];
                const firstname = match[2];
                const middlename = match[3];
                const lastname = match[4];

                passport_fields[
                    "name"
                ].value = `${firstname} ${middlename} ${lastname}`;
                passport_fields["nickname"].value = lastname;
            } else {
                console.log("No match found.");
            }

            //2

            console.log(lines);
            const match2 = lines[1].match(
                /^([A-Z0-9]{9})(.)([A-Z]{3})(\d{6})(.)([MF])(\d{6})/
            );

            if (match2) {
                const passport_number = match2[1];
                const nation = match2[3];
                const birth_date = match2[4];
                const gender = match2[6];
                const passport_expire_date = match2[7];

                // Rearrange the date strings to YYYY-MM-DD format
                const formattedBirthDate = `${birth_date.slice(
                    0,
                    2
                )}${birth_date.slice(2, 4)}${birth_date.slice(4)}`;

                const formattedExpireDate = `${passport_expire_date.slice(
                    0,
                    2
                )}${passport_expire_date.slice(
                    2,
                    4
                )}${passport_expire_date.slice(4)}`;

                passport_fields["passport_number"].value = passport_number;
                passport_fields["nation"].value = nation;
                passport_fields["birth_date"].value = formatDate(
                    formattedBirthDate,
                    true
                );
                passport_fields["gender"].value = gender === "M" ? 1 : 0;
                passport_fields["passport_expire_date"].value = formatDate(
                    formattedExpireDate,
                    false
                );
            } else {
                console.log("No match found.");
            }
        };
    }
});

function formatDate(dateString, isBirthDate) {
    const year = parseInt(dateString.slice(0, 2));
    const month = dateString.slice(2, 4);
    const day = dateString.slice(4, 6);

    // Determine the full year based on the type of date
    const fullYear = isBirthDate
        ? year < 21
            ? 2000 + year
            : 1900 + year
        : 2000 + year;
    return `${fullYear}-${month}-${day}`;
}

let camera_button = document.querySelector("#start-camera");
let video = document.querySelector("#video");
let click_button = document.querySelector("#click-photo");
let canvas = document.querySelector("#canvas");
let img = document.querySelector("#img");

camera_button.addEventListener("click", async function () {
    let stream = await navigator.mediaDevices.getUserMedia({
        video: true,
        audio: false,
    });
    video.srcObject = stream;
    video.classList.remove("hidden");
    canvas.classList.add("hidden");
});

click_button.addEventListener(
    "click",
    function () {
        canvas
            .getContext("2d")
            .drawImage(video, 0, 0, canvas.width, canvas.height);
        let image_data_url = canvas.toDataURL("image/jpeg");

        video.srcObject = null;
        video.classList.add("hidden");
        canvas.classList.remove("hidden");

        canvas.toBlob(function (blob) {
            let file = new File([blob], "captured_image.png", {
                type: "image/png",
            });
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            img.files = dataTransfer.files;
        });
    },
    "image/*"
);
