SCRIPT_DIR=$( cd -- "$( dirname -- "${BASH_SOURCE[0]}" )" &> /dev/null && pwd ) # Get the path of this script
scp -P 9284 -rp $SCRIPT_DIR/../public_html/ seasoning@seasoning.live:development/ # Copy all to server
