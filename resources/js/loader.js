
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector(
                  ".myTable").style.visibility = "hidden";
                document.querySelector(
                  "#loader").style.visibility = "visible";
            } else {
                document.querySelector(
                  "#loader").style.display = "none";
                document.querySelector(
                  ".myTable").style.visibility = "visible";
            }
        };
