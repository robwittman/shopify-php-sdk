.PHONY: test lint cs

test:
	./vendor/bin/phpunit
lint:
	./vendor/bin/phplint ./ --exclude=vendor
cs:
	./vendor/bin/phpcs ./lib
cbf:
	./vendor/bin/phpcbf ./lib
