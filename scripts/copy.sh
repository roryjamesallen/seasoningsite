SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd ) # Get the path of this script
ssh seasoning@seasoning.live '
mv public_html/cgi-bin tmp/ &&
mv public_html/php.ini tmp/ &&
mv public_html/.htaccess tmp/ &&
rm -rf public_html/* &&
cp -r tmp/cgi-bin public_html/ &&
cp tmp/php.ini public_html/ &&
cp tmp/.htaccess public_html/' # Remove all public html contents apart from cgi-bin and php.ini and .htaccess
scp -r $SCRIPT_DIR/../public_html/* seasoning@seasoning.live:public_html/ # Copy all to server public_html
scp -r $SCRIPT_DIR/../lib.php seasoning@seasoning.live:public_html/ # Copy lib to server public_html
ssh seasoning@seasoning.live 'mv public_html/lib.php ./' # Move lib to root
