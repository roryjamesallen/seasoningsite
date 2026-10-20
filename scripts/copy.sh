SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd ) # Get the path of this script

ssh seasoning@seasoning.live '
cd tmp &&
git pull &&
cd .. &&
bash tmp/scripts/deploy.sh &&
rm -rf archive &&
cp public_html/.htaccess tmp/public_html/ &&
mv public_html archive &&
rm -rf public_html &&
mv tmp/public_html public_html &&
mv tmp/lib.php ./ &&
chmod 777 public_html'
