# Create second_db and third_db database if it doesn't exist
CREATE DATABASE IF NOT EXISTS second_db;
CREATE DATABASE IF NOT EXISTS third_db;
# Grant all privilidges on second_db to org_user
GRANT ALL PRIVILEGES ON second_db.* TO 'test_user' identified by 'test_pass';
GRANT ALL PRIVILEGES ON third_db.* TO 'test_user' identified by 'test_pass';
#GRANT ALL PRIVILEGES ON *.* TO 'test_user' identified by 'test_pass';