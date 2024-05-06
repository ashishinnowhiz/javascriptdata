<input type="datetime" name="mydatetime" class="form-control" />>
<div id="MyClockDisplay">
</div>
<div>  <script>
    // setInterval(function() {
    //     showTime('<?php echo $lottery->draw_time; ?>', '<?php echo $index; ?>');
    // }, 1000);
    setInterval(function() {
        showTime('2024-12-31 10:20:30');
    }, 1000);
</script>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function showTime(timeVal) {
            console.log(timeVal);
            var date = new Date();
            var targetDate = new Date(timeVal);
            var diff = targetDate - date;
            var days = Math.floor(diff / (1000 * 60 * 60 * 24));
            var hours = Math.floor((diff - (days * 1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((diff - (days * 1000 * 60 * 60 * 24) - (hours * 1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((diff - (days * 1000 * 60 * 60 * 24) - (hours * 1000 * 60 * 60) - (minutes * 1000 *
                60)) / 1000);
                
            time =
                '<div class="row"><div class="col-3 text-center border-warning border-end"><h6 class="m-0 mb-1 p-0">' +
                days + '</h6><p class="m-0 p-0">Days</p></div>';
            time += '<div class="col-3 text-center border-warning border-end"><h6 class="m-0 mb-1 p-0">' + hours +
                '</h6><p class="m-0 p-0">Hours</p></div>';
            time += '<div class="col-3 text-center border-warning border-end"><h6 class="m-0 mb-1 p-0">' + minutes +
                '</h6><p class="m-0 p-0">Minutes</p></div>';
            time += '<div class="col-3 text-center"><h6 class="m-0 mb-1 p-0">' + seconds +
                '</h6><p class="m-0 p-0">Seconds</p></div></div>';
            $("#MyClockDisplay").html(time);
            setTimeout(showTime, 1000);
        }
        
    </script>
     <!-- fetch record in javascript -->
    <script type="text/javascript">
        //get record function
  async function getData(url, data) {
    const response = await fetch(url, {
        method: "POST",
        mode: "cors",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json",
        },
        redirect: "follow",
        referrerPolicy: "no-referrer",
        body: JSON.stringify(data),
    });
    return response.json();
    }
    //get data async function call
	 async function runGetdata(data2){
			try {
				const data = await getData('<?php echo base_url('Getdata10') ?>', data2); // Pass any required data
				return data;
			} catch (error) {
				console.log('Error:', error);
				throw error; // Re-throw the error to propagate it to the caller
			}
		}
	//post data in using fetch api
  async function postData(url, data){
  const response = await fetch(url, {
    method: "POST",
    mode: "cors",
    cache: "no-cache",
    credentials: "same-origin",
    redirect: "follow",
    referrerPolicy: "no-referrer",
    body: JSON.stringify(data),
  });
  return response.json();
  }
  	//post data in async function
      function runCode(data) {
			postData("<?php echo base_url('InsertData10') ?>", data)
				.then((response) => {
				 console.log(response);
				})
				.catch((error) => {
					console.log('Error:', error);
				});
		}
        //onclick submit button
    document.getElementById('submitBtn').addEventListener('click', async () => {
    try {
    const minLimitValue = document.getElementById('minLimit').value;
    const maxLimitValue = document.getElementById('maxLimit').value;
    // Check if values are not empty
    if (!minLimitValue || !maxLimitValue) {
      console.log('Minimum and Maximum limit values are required.');
      return;
    }
    const data2 = {
      minLimit: minLimitValue,
      maxLimit: maxLimitValue,
    };
    const responseData = await runGetdata(data2); //get data function call
    //console.log(responseData);
	const result = await runCode(responseData); //postdata function call
    //console.log(result);
  } catch (error) {
    console.log('Error:', error);
  }
}); //generate ra end
 //getdata
async function runGetdata2(data2) {
			try {
				const data = await getData2('<?php echo base_url('Getdata2') ?>', data2); // Pass any required data
				return data;
			} catch (error) {
				console.log('Error:', error);
				throw error; // Re-throw the error to propagate it to the caller
			}
		}
        async function getData2(url, data) {
    const response = await fetch(url, {
        method: "POST",
        mode: "cors",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json",
        },
        redirect: "follow",
        referrerPolicy: "no-referrer",
        body: JSON.stringify(data),
    });
    return response.json();
    }

document.getElementById('submitBtn2').addEventListener('click', async () => {
  try {
    const minLimitValue = document.getElementById('minLimit2').value;
    const maxLimitValue = document.getElementById('maxLimit2').value;
    // Check if values are not empty
    if (!minLimitValue || !maxLimitValue) {
      console.log('Minimum and Maximum limit values are required.');
      return;
    }
    const data2 = {
      minLimit: minLimitValue,
      maxLimit: maxLimitValue,
    };
    const responseData = await runGetdata2(data2);
    console.log(responseData);
	// const result = await runCode2(responseData);
    // console.log(result);
  } catch (error) {
    console.log('Error:', error);
  }
});
//generate marksheet data


</script>
