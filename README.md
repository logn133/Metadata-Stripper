# Metadata-Stripper
A program written in PHP that takes an uploaded picture, saves it and reads it to display what the file has to offer. It will then display this to the user, giving the user the option to choose what tags they wish to remove. It will then remove the desired metadata, save the file and allow the user to re-download it.

## Usage 
To use the stripper, clone the repository and run the script on a php server.

Open up the file with a php server and bingo bango bongo you're donzo.

## Notes
This was originally made with an Amazon EC2 AMI. So double check your variables are correct, and if neccessary edit the `$uploaddir` variable to match your OS and service. 

ChromePHP is used as a debugger. For more information and installation instructions, go to https://github.com/ccampbell/chromephp. *This will be removed in the final version.*

## ToDo
~~- Upload to Github~~
~~- Make it work~~
- Catch and delete desired metadata
- Create a new file with the desired metadata
- Make the new file downloadable
- Create a UX/UI for webpage
