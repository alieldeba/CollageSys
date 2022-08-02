let submit = document.querySelector(".submit");
let name = document.querySelector(".name-select");
let spec = document.querySelector(".spec-select");
let status = document.querySelector(".status-select");
let subject = document.querySelector(".subject-select");
let term = document.querySelector(".term-select");
let reset = document.querySelector(".reset");

let query = [];

// make array of ['name of input' , DomElement]
[status, subject, term , name , spec].forEach((el) => {
    if (el) {
        query.push([el.getAttribute("name"), el]);
    }
});

// to select queary prams
const params = new Proxy(new URLSearchParams(window.location.search), {
    get: (searchParams, prop) => searchParams.get(prop),
});

// add selected attripute to option
window.onload = () => {
    let sub = params.subject;
    let specPram = params.spec;
    let status = params.status;
    let term = params.term;
    let namePram = params.name;

    let options_status = document.querySelectorAll(".status-select option");
    let options_subject = document.querySelectorAll(".subject-select option");
    let options_term = document.querySelectorAll(".term-select option");
    let options_spec = document.querySelectorAll(".spec-select option");


    if (namePram) {
        name.value = namePram
    }
    
    if (specPram) {
        options_spec.forEach((el) => {
            if (el.value == specPram) el.setAttribute("selected", true);
        });
    }

    if (sub) {
        options_subject.forEach((el) => {
            if (el.value == sub) el.setAttribute("selected", true);
        });
    }

    if (status) {
        options_status.forEach((el) => {
            if (el.value == status) el.setAttribute("selected", true);
        });
    }

    if (term) {
        options_term.forEach((el) => {
            if (el.value == term) el.setAttribute("selected", true);
        });
    }
};

// add functnality to buttons
if (submit) {
    submit.addEventListener("click", () => {
        // $querySTR = `?status=${status.value}&subject=${subject.value}`;
        // str.slice(0, -1);

        let $querySTR = "?";

        for (let i = 0; i < query.length; i++) {
            if (query[i][1].value || false) {
                console.log(i, query.length);
                $querySTR += `${query[i][0]}=${query[i][1].value}&`;
            }
        }

        if ($querySTR[$querySTR.length -1] == '&') $querySTR = $querySTR.slice(0, -1);

        // console.log($querySTR)

        window.location.assign(location.protocol + '//' + location.host + location.pathname + $querySTR)
    });
}

if (reset) {
    reset.addEventListener("click", (e) => {
        window.location.assign(
            location.protocol + "//" + location.host + location.pathname
        );
    });
}
