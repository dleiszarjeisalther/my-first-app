$rootPath = Get-Location
$assetsDir = "assets"
$cssFile = "reader-tts.css"
$jsFile = "reader-tts.js"

# Get all HTML files in subdirectories
$htmlFiles = Get-ChildItem -Path $rootPath -Filter "*.html" -Recurse | Where-Object { $_.DirectoryName -ne $rootPath -and $_.DirectoryName -notlike "*$assetsDir*" }

foreach ($file in $htmlFiles) {
    Write-Host "Processing $($file.FullName)..."
    $content = Get-Content -Path $file.FullName -Raw

    $injectedCss = "<link rel=""stylesheet"" href=""../assets/$cssFile"">"
    $injectedJs = "<script src=""../assets/$jsFile"" defer></script>"

    $modified = $false

    if ($content -notlike "*$cssFile*") {
        $content = $content -replace "</head>", "$injectedCss`n</head>"
        $modified = $true
    }

    if ($content -notlike "*$jsFile*") {
        $content = $content -replace "</head>", "$injectedJs`n</head>"
        $modified = $true
    }

    if ($modified) {
        Set-Content -Path $file.FullName -Value $content -Encoding UTF8
        Write-Host "  Updated."
    } else {
        Write-Host "  Already injected."
    }
}

Write-Host "Injection complete."
