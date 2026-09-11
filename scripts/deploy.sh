SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd ) # Get the path of this script
cd $SCRIPT_DIR
php generate_sitemap.php
rm -rf $SCRIPT_DIR/../public_html/ # Delete any old built files
mkdir $SCRIPT_DIR/../public_html # Make the build directory
cp -rp $SCRIPT_DIR/../src/. $SCRIPT_DIR/../public_html/ # Copy every file and dir from src to public_html
