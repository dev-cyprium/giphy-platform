# giphy-platform
Giphy platform used a school project for Laravel framework

## Setup instructions

### Initial setup

Setting up the git repository:

  1) Fork the repository using the GitHub 
  2) Clone the forked version ( `git clone <fork-url>` )
  3) Setup the `upstream` ( `git remote add upstream https://github.com/dev-cyprium/giphy-platform.git` )
      - The upstream is used to sync with the original repository. For example, when some commits are added you need to **pull from** the latest changes in order to get in sync. Before making a pull request, make sure to sync with the upstream.

### Pull requests
In order to issue a pull request do the following:
  
  1) Have all your changes ready and commited locally
  2) Push to the `origin` branch ( your fork )
  3) Using the GitHub Site GUI create a cross-fork pull request
  4) Wait for reviews, if change is requested get back to (1)

### Project
The project is a laravel project which requires the following to be setup:
  
  1) Run the `composer install` to install the dependencies
  2) Configure the `.env` file, for Giphy Key you need to ask for it
  