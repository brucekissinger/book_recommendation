#/bin/bash

#
# This script performs all daily processing needed to generate recommendations
# and ratings.
#

# environment settings
DATA=/opt/book/data
MEDIALITE=/opt/book/MyMediaLite-3.10/lib/mymedialite
MONO=/usr/bin

# create the rating.txt file based on database information
#curl http://localhost:6464/book/utility/generate_ratings

# create the item_attribute.txt file based on database information
#curl http://localhost:6464/book/utility/generate_item_attributes

# sleep for 3 minutes to wait for the item attributes file to finish writing
#sleep 3m

# generate user recommendations
#$MONO/mono $MEDIALITE/item_recommendation.exe --training-file=$DATA/rating.txt --item-attributes=$DATA/item_attributes.txt --recommender=BPRMF --prediction-file=$DATA/item_predict.txt --predict-items-number=20 --test-file=$DATA/rating_test.txt --rating-threshold=3

# experimental 
#$MONO/mono $MEDIALITE/item_recommendation.exe --training-file=$DATA/rating.txt  --recommender=BPRMF --prediction-file=$DATA/item_predict.txt --predict-items-number=20 --test-file=$DATA/rating_test.txt --rating-threshold=3

# experimental - this throws an error
#$MONO/mono $MEDIALITE/item_recommendation.exe --training-file=$DATA/rating.txt --item-attributes=$DATA/item_attributes.txt --recommender=BPRLinear --prediction-file=$DATA/item_predict.txt --predict-items-number=20 --test-file=$DATA/rating_test.txt --rating-threshold=3

# experimental - this takes a long time to run
$MONO/mono $MEDIALITE/item_recommendation.exe --training-file=$DATA/rating.txt --item-attributes=$DATA/item_attributes.txt --recommender=ItemAttributeKNN --prediction-file=$DATA/item_predict.txt --predict-items-number=20 --test-file=$DATA/rating_test.txt --rating-threshold=3

# load the user recommendations back into the database
curl http://localhost:6464/book/utility/load_predictions 
