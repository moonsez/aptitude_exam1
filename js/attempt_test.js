// Disable right-click (context menu)
document.addEventListener('contextmenu', function(event) {
  event.preventDefault();
});

// Disable keyboard shortcuts (like F12, CTRL+R, etc.)
document.addEventListener('keydown', function(event) {
  if (event.keyCode === 123 || // F12 for Dev Tools
      event.keyCode === 116 || // F5 for Refresh
      (event.ctrlKey && event.keyCode === 82) || // Ctrl+R for Reload
      (event.ctrlKey && event.keyCode === 85)) { // Ctrl+U for View Source
      event.preventDefault();
  }
});

// Prevent page navigation (refresh or back)
window.onbeforeunload = function() {
  return 'Are you sure you want to leave the test? Your progress will be lost!';
};

// Detect if the user switches tabs (goes inactive)
// document.addEventListener('visibilitychange', function() {
//   if (document.hidden) {
//       alert('Please return to the test tab! Switching tabs is not allowed.');
//   }
// });
let switchCount = 0;
let isTestSubmitted = false; // Prevent duplicate execution

document.addEventListener("visibilitychange", function () {
    if (document.hidden) {
        switchCount++;

        if (switchCount >= 3 && !isTestSubmitted) {
            isTestSubmitted = true; // Prevent duplicate execution
            bootbox.alert("You have switched tabs too many times. The exam will be submitted.", function () {
                if (typeof submit_test_warn === "function") {
                    submit_test_warn();
                } else {
                    console.error("submit_test_warn function not found.");
                }
            });
        } else {
            bootbox.alert(`Warning: Do not switch tabs during the exam.`);
        }
    }
});

function submit_test_warn() {
    var form = "#test_form";
    var url = $(form).attr("rel");
    var serialize_data = $(form).serialize();

    $.ajax({
        type: "POST",
        url: completeURL(url),
        dataType: "json",
        data: serialize_data,
        success: function (data) {
            if (data.valid) {
                let alertBox = bootbox.dialog({
                    message: data.msg,
                    closeButton: false,
                });

                setTimeout(function () {
                    alertBox.modal("hide");
                    location.href = completeURL(data.redirect);
                }, 3000);
            }
        }
    });
}

  
// window.onblur = function() {
//   alert('You switched tabs! Stay focused on the test.');
// };

// Optional: Full-Screen mode at the start of the test
// function startFullScreen() {
//   var elem = document.documentElement;
//   if (elem.requestFullscreen) {
//       elem.requestFullscreen();
//   } else if (elem.mozRequestFullScreen) { // Firefox
//       elem.mozRequestFullScreen();
//   } else if (elem.webkitRequestFullscreen) { // Chrome, Safari and Opera
//       elem.webkitRequestFullscreen();
//   } else if (elem.msRequestFullscreen) { // IE/Edge
//       elem.msRequestFullscreen();
//   }
// }

// Prevent window scrolling
window.addEventListener('scroll', function() {
  window.scrollTo(0, 0);
});

// Optional: Display a message if the user exits full-screen
document.addEventListener('fullscreenchange', function() {
  if (!document.fullscreenElement) {
      document.getElementById('fullscreen-message').style.display = 'flex';
  } else {
      document.getElementById('fullscreen-message').style.display = 'none';
  }
});

// Start full-screen when the page loads
window.onload = function() {
  //startFullScreen();
};
  
document.addEventListener('copy', function(event) {
  event.preventDefault();
});

document.addEventListener('paste', function(event) {
  event.preventDefault();
});

// Disable text selection for the entire document
document.addEventListener('selectstart', function(event) {
  event.preventDefault();
});
