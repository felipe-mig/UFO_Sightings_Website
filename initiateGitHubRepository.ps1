# Initialize a new Git repository
git init

# Add the remote repository
git remote add origin https://github.com/felipe-mig/UFO-sightings-website.git

# Add all files to the staging area
git add .

# Commit the changes with a message
git commit -m "Initial commit: Add project files for UFO-sightings-website"

# Rename the branch to main
git branch -M main

# Push the changes to the remote repository
git push -u origin main

# Verify the repository URL
Start-Process "https://github.com/felipe-mig/UFO-sightings-website"


try {
    Write-Host "Repository setup successfully and files pushed to GitHub." -ForegroundColor Cyan
} catch {
    Write-Host "An error occurred during the repository setup." -ForegroundColor Red
}




