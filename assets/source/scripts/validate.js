var subscribeBtn = document.querySelectorAll('.submit-btn');

subscribeBtn.forEach(function (e, i) {
  e.addEventListener('click', function () {
    e.preventDefault;
    var parent = e.parentNode;
    var subscribeInput = parent.querySelector('.email');
    var email = subscribeInput.value;
    //      isvalidemail(email);
    if (isvalidemail(email)) {
      e.parentNode.classList.add('success');
      e.parentNode.classList.remove('error');
      subscribeInput.classList.remove('invalid');
    } else {
      subscribeInput.classList.add('invalid');
      e.parentNode.classList.add('error');
    }
  });
});

// Function: valid email address without regex
function isvalidemail(email) {

  // Get email parts
  var emailParts = email.split('@');

  // There must be exactly 2 parts
  if (emailParts.length !== 2) {
    //        alert("Wrong number of @ signs");
    return false;
  }

  // Name the parts
  var emailName = emailParts[0];
  var emailDomain = emailParts[1];

  // === Validate the parts === \\

  // Define valid chars
  var validChars = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '.', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '_', '-'];

  // emailName must only include valid chars
  for (var i = 0; i < emailName.length; i += 1) {
    if (validChars.indexOf(emailName.charAt(i)) < 0) {
      //            alert("Invalid character in name section");
      return false;
    }
  }
  // emailDomain must only include valid chars
  for (var j = 0; j < emailDomain.length; j += 1) {
    if (validChars.indexOf(emailDomain.charAt(j)) < 0) {
      //            alert("Invalid character in domain section");
      return false;
    }
  }

  // Domain must include but not start with .
  if (emailDomain.indexOf('.') <= 0) {
    //        alert("Domain must include but not start with .");
    return false;
  }

  // Domain's last . should be 2 chars or more from the end
  var emailDomainParts = emailDomain.split('.');
  if (emailDomainParts[emailDomainParts.length - 1].length < 2) {
    //        alert("Domain's last . should be 2 chars or more from the end");
    return false;
  }

  return true;
}