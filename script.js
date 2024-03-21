const sitesData = {
    SCPC: [
        "Sfax",
        "Mnihla",
        "Zarzis",
        "Marroc"
    ],
    Sodimac: [
        "Sfax",
        "Marroc",
        "Mnihla"
    ],
    Sofap: [
        "Sfax",
        "Gabes"
    ],
    STHL: [
        "Sfax"
    ],
    Sofcasud: [
        "Sfax"
    ],
    EMS: [
        "Sfax"
    ],
    TMS: [
        "Sfax"
    ],
    SIT_Hammamet: [
        "Sfax"
    ],
    Hannabal_immobilier: [
        "Sfax"
    ],
    CHD: [
        "Sfax"
    ],
    TGM: [
        "Sfax"
    ],
    SLCM: [
        "Sfax"
    ],
    STMT: [
        "Sfax"
    ],
};
const companySelect = document.getElementById("company");
const siteSelect = document.getElementById("site");
companySelect.addEventListener("change", populateSites);
function populateSites() {
    const selectedCompany = companySelect.value;
    const sites = sitesData[selectedCompany];
    siteSelect.innerHTML = "<option value=''>Select site</option>";
    if (sites) {
        sites.forEach((site) => {
            const option = document.createElement("option");
            option.value = site;
            option.textContent = site;
            siteSelect.appendChild(option);
        });
    }
}