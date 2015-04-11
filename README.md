# newsletter
A quick build to try out and figure out how to implement the ibrose newsletter bundle.  before including it in portal.



### Create the databases

mandants are used to provide seperate databases for clients/organisations.

``` bash
# create the empty databases
$ app/console doctrine:database:create
$ app/console doctrine:database:create --connection=mandantA
$ app/console doctrine:database:create --connection=mandantB

# create the database schemas
$ php app/console doctrine:schema:create --em default
$ php app/console doctrine:schema:create --em mandantA
$ php app/console doctrine:schema:create --em mandantB

# enable the mandants (insert them in the defined database - already existings will be ignored)
$ php app/console ibrows:newsletter:mandants:enable
``` 
