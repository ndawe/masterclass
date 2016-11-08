<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ATLAS Masterclass Plotting</title>
<script src="plotly-latest.min.js"></script>
<link rel="stylesheet" type="text/css" href="layout.css">
</head>
<body>
<?php require_once('data.php'); ?>
<p align="right" style="padding:0 20px 0 0;"><a href="admin.php" style="color:#bbb;">Admin Controls</a></p>
<div id="wrapper">

<div id="plot-all" class="plot"></div>
<div id="plot-dilepton" class="plot"></div>
<div id="plot-4lepton" class="plot"></div>
<div id="plot-diphoton" class="plot"></div>

<div id="upload-form" style="margin: 0 auto;text-align: center;">
<form action='upload.php' enctype='multipart/form-data' method='post'>
<input type="file" name='filename' id='filename' accept='.csv, .txt'/>
<label for="filename" class="button">
Select File
</label></br>
<input type="password" class="password" name="password" placeholder="Password" required/></br>
<input type="submit" name="upload_masses" value="Upload Masses" class="button"/>
</form>
</div>
</div>
<script>

// Receive array of masses from PHP
var masses      = JSON.parse("<?php echo json_encode($masses); ?>");
var masses_2e   = JSON.parse("<?php echo json_encode($masses_2e); ?>");
var masses_2m   = JSON.parse("<?php echo json_encode($masses_2m); ?>");
var masses_4e   = JSON.parse("<?php echo json_encode($masses_4e); ?>");
var masses_4m   = JSON.parse("<?php echo json_encode($masses_4m); ?>");
var masses_2m2e = JSON.parse("<?php echo json_encode($masses_2m2e); ?>");
var masses_ph   = JSON.parse("<?php echo json_encode($masses_ph); ?>");

// Histogram data
var masses = {
    x: masses,
    type: 'histogram',
    marker: {
        color: 'lightseagreen',
    },
    name: 'All Events',
    autobinx: false,
    xbins: {
        start:0,
        end:2000,
        size:10,
    },
};

var masses_2e = {
    x: masses_2e,
    y: Array(masses_2e.length).fill(1),
    type: 'histogram',
    marker: {
        color: 'blue',
    },
    name: '2el',
};

var masses_2m = {
    x: masses_2m,
    y: Array(masses_2m.length).fill(1),
    type: 'histogram',
    marker: {
        color: 'yellow',
    },
    name: '2mu',
};

var masses_4e = {
    x: masses_4e,
    type: 'histogram',
    marker: {
        color: 'blue',
    },
    name: '4el',
    autobinx: false,
    xbins: {
        start:60,
        end:360,
        size:5,
    },
};

var masses_4m = {
    x: masses_4m,
    type: 'histogram',
    marker: {
        color: 'yellow',
    },
    name: '4mu',
    autobinx: false,
    xbins: {
        start:60,
        end:360,
        size:5,
    },
};

var masses_2m2e = {
    x: masses_2m2e,
    type: 'histogram',
    marker: {
        color: 'green',
    },
    name: '2el + 2mu',
    autobinx: false,
    xbins: {
        start:60,
        end:360,
        size:5,
    },
};

var masses_ph = {
    x: masses_ph,
    type: 'histogram',
    marker: {
        color: 'red',
    },
    name: 'Diphoton',
    autobinx: false,
    xbins: {
        start:80,
        end:160,
        size:2,
    },
};

var layout_all = {
    title: "All Invariant Masses",
    xaxis: {
        autorange: false, 
        range: [0, 3.3],
        title: 'Mass [GeV]', 
        type: 'log',
        showline: true,
        mirror: 'allticks',
        ticks: 'outside',
        linewidth:2,
    },
    yaxis: {
        autorange: true, 
        title: 'Counts', 
        showline: true,
        mirror: 'allticks',
        ticks: 'outside',
        gridwidth:2,
        linewidth:2,
    },
    margin: {l: 50, b: 40, r: 20, t: 40},
    barmode: 'stack',
};

var layout_dilepton = {
    title: "Dilepton Invariant Masses",
    xaxis: {
        autorange: false, 
        range: [0, 3.3],
        title: 'Mass [GeV]', 
        type: 'log',
        showline: true,
        mirror: 'allticks',
        ticks: 'outside',
        linewidth:2,
    },
    yaxis: {
        autorange: true, 
        title: 'Counts', 
        showline: true,
        mirror: 'allticks',
        ticks: 'outside',
        gridwidth:2,
        linewidth:2,
    },
    margin: {l: 50, b: 40, r: 20, t: 40},
    barmode: 'stack',
    showlegend: true,
    legend: {
        x: 0.8,
        y: 0.9,
        bgcolor: 'rgba(0,0,0,0)',
    }
};

var layout_4lepton = {
    title: "Four Lepton Invariant Masses",
    xaxis: {
        autorange: false, 
        range: [60, 360],
        title: 'Mass [GeV]', 
        showline: true,
        mirror: 'allticks',
        ticks: 'outside',
        linewidth:2,
    },
    yaxis: {
        autorange: true, 
        title: 'Counts', 
        showline: true,
        mirror: 'allticks',
        ticks: 'outside',
        gridwidth:2,
        linewidth:2,
    },
    margin: {l: 50, b: 40, r: 20, t: 40},
    barmode: 'stack',
    showlegend: true,
    legend: {
        x: 0.8,
        y: 0.9,
        bgcolor: 'rgba(0,0,0,0)',
    }
};

var layout_ph = {
    title: "Diphoton Invariant Masses",
    xaxis: {
        autorange: false, 
        range: [80, 160],
        title: 'Mass [GeV]', 
        showline: true,
        mirror: 'allticks',
        ticks: 'outside',
        linewidth:2,
    },
    yaxis: {
        autorange: true, 
        title: 'Counts', 
        showline: true,
        mirror: 'allticks',
        ticks: 'outside',
        gridwidth:2,
        linewidth:2,
    },
    margin: {l: 50, b: 40, r: 20, t: 40},
    barmode: 'stack',
};

Plotly.newPlot('plot-all', [masses], layout_all);
Plotly.newPlot('plot-dilepton', [masses_2e, masses_2m], layout_dilepton);
Plotly.newPlot('plot-4lepton', [masses_4e, masses_4m, masses_2m2e], layout_4lepton);
Plotly.newPlot('plot-diphoton', [masses_ph], layout_ph);

// Update file selector with filename 
var fileinput = document.getElementById('filename'); /* finds the input */
function changeLabelText() {
    var filepath = fileinput.value; /* gets the filepath and filename from the input */
    var filenamestart = filepath.lastIndexOf('\\'); /* finds the end of the filepath */
    var filename = filepath.substr(filenamestart + 1); /* isolates the filename */
    if (filename !== '') {
        var fileinputtext = document.querySelector('label[for="filename"]').childNodes[0]; /* finds the label text */
        fileinputtext.textContent = filename; /* changes the label text */
    }
}
/* runs the function whenever the filename in the input is changed */
fileinput.addEventListener('change', changeLabelText, false);

</script>
</body>
</html>
