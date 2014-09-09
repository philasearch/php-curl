# A sample Guardfile
# More info at https://github.com/guard/guard#readme

guard 'phpunit2', :cli => '--colors', tests_path: 'tests' do

  watch(%r{^.+Test\.php$})

  #watch(%r{lib/Philasearch/Curl/(.+)\.php}) { |m| "tests/Philasearch/Curl/#{m[1]}Test.php" }
end