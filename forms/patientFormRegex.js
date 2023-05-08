let adultError = document.querySelector(".adultError");
let adultSubmitBtn = document.querySelector("#adultSubmitBtn");
let adultFormInputs = Array.from(document.querySelectorAll(".adultForm input"));

let FormErrorsMSG = [];

adultSubmitBtn.addEventListener("click", function (e) {
  e.preventDefault();
  FormErrorsMSG = [];

  let onlyStringRegex = /^[a-zA-Z]+$/;
  let emptyRegex = /^$/;
  let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  for (let i = 0; i < adultFormInputs.length; i++) {
    console.log(adultFormInputs[i].value);
    if (emptyRegex.test(adultFormInputs[i].value)) {
      FormErrorsMSG.push("All fields should be filled");
      break;
    } else {
      // first name
      if (adultFormInputs[i].name == "fName") {
        if (!onlyStringRegex.test(adultFormInputs[i].value)) {
          FormErrorsMSG.push("First name not valid");
        }
      }
      // last name
      if (adultFormInputs[i].name == "lName") {
        if (!onlyStringRegex.test(adultFormInputs[i].value)) {
          FormErrorsMSG.push("Last name not valid");
        }
      }

      if (adultFormInputs[i].name == "email") {
        if (!emailRegex.test(adultFormInputs[i].value)) {
          FormErrorsMSG.push("Email not valid");
        }
      }
    }
  }

  console.log(FormErrorsMSG);

  if (FormErrorsMSG.length > 0) {
    let tmp = ``;
    for (let i = 0; i < FormErrorsMSG.length; i++) {
      tmp += `<p class="m-0">- ${FormErrorsMSG[i]}</p>`;
    }

    adultError.innerHTML = tmp;
    adultError.classList.remove("d-none");
  } else {
    console.log(0);
    adultError.classList.add("d-none");
  }
});

let notAdultSubmitBtn = document.querySelector("#notAdultSubmitBtn") ;
let notAdultFormInputs = Array.from(document.querySelectorAll(".notAdultForm input"));
let notAdultError = document.querySelector(".notAdultError");

notAdultSubmitBtn.addEventListener("click", function (e) {
    e.preventDefault();
    FormErrorsMSG = [];

  
    let onlyStringRegex = /^[a-zA-Z]+$/;
    let emptyRegex = /^$/;
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
    for (let i = 0; i < notAdultFormInputs.length; i++) {
      if (emptyRegex.test(notAdultFormInputs[i].value)) {
        FormErrorsMSG.push("All fields should be filled");
        break;
      } else {
        // first name
        if (notAdultFormInputs[i].name == "fName") {
          if (!onlyStringRegex.test(notAdultFormInputs[i].value)) {
            FormErrorsMSG.push("First name not valid");
          }
        }
        // last name
        if (notAdultFormInputs[i].name == "lName") {
          if (!onlyStringRegex.test(notAdultFormInputs[i].value)) {
            FormErrorsMSG.push("Last name not valid");
          }
        }
  
        if (notAdultFormInputs[i].name == "email") {
          if (!emailRegex.test(notAdultFormInputs[i].value)) {
            FormErrorsMSG.push("Email not valid");
          }
        }
      }
    }
  
    if (FormErrorsMSG.length > 0) {
      let tmp = ``;
      for (let i = 0; i < FormErrorsMSG.length; i++) {
        tmp += `<p class="m-0">- ${FormErrorsMSG[i]}</p>`;
      }
  
      notAdultError.innerHTML = tmp;
      notAdultError.classList.remove("d-none");
    } else {
      notAdultError.classList.add("d-none");
    }
  });

