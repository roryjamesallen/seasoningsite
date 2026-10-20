SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd ) # Get the path of this script

ssh seasoning@seasoning.live 'rm -rf tmp/*'

scp -r $SCRIPT_DIR/../public_html/* seasoning@seasoning.live:tmp/ # Copy all to server tmp
scp -r $SCRIPT_DIR/../lib.php seasoning@seasoning.live:tmp/ # Copy lib to server tmp

ssh seasoning@seasoning.live '
cp public_html/cgi-bin tmp/ &&
cp public_html/php.ini tmp/ &&
cp public_html/.htaccess tmp/ &&
mv tmp/lib.php ./ &&
rm -rf archive &&
mv public_html archive &&
rm -rf public_html &&
mv tmp public_html &&
chmod 777 public_html'
