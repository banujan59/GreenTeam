// object of type student
					function student(id, fname, lname, phone, emergencyPhone, bday, balance, balanceDueDate, courseID)
					{
						this.studentId = id;
						this.firstName = fname;
						this.lastName = lname;
						this.phone = phone;
						this.emergencyPhoneNumber = emergencyPhone;
						this.birthdate = bday;
						this.balance = balance;
						this.balanceDueDate = balanceDueDate;
						this.courseID = courseID;
					}

							// array that will contain all students
					var allStudents = [];

					$(function()
					{	
						tableRowEvent();
						
						// event handler for search box
						$("input[name=searchField]").keyup(function(e)
						{
							e.preventDefault();

							var toSearch = $(this).val();

							if(toSearch != "")
							{
								var criteria = $("input[name=searchCriteria]:checked").val();

								// create the RegExp
								pattern = new RegExp(toSearch, "i");

								// create an array to store search results
								var results = [];

								// check each elements of the catalog for pattern
								for(var i = 0 ; i < allStudents.length ; i++)
								{
									// store each string to serach in a variable
									var lname = allStudents[i].lastName;
									var fname = allStudents[i].firstName;
									var bday = allStudents[i].birthdate;
									//var language = allStudents[i].language;

									// get the property according to the criteria
									var currentProperty = undefined;
									if(criteria == "lname")
									{
										currentProperty = allStudents[i].lastName;
									}

									else if(criteria == "fname")
									{
										currentProperty = allStudents[i].firstName;
									}

									else if(criteria == "birthdate")
									{
										currentProperty = allStudents[i].birthdate;
									}

									else if(criteria == "all")
									{
									}

									// perform the search....
									if( currentProperty.search(pattern) != -1 )
									{
										// if match is found, then store current index to results array
										results[results.length] = allStudents[i];
									}
								}

								// if at least one match has been found, then show result in a table using showListOfProducts(var) function
								if(results.length > 0)
								{
									displaySearchResult(results, criteria);
								}

								// if no results have been found
								else
								{
									$("tbody").html("<p>Sorry. No matches for your search.</p>");
								}
							}

							else
							{
								displaySearchResult(allStudents);
							}
						});
					});

					function displaySearchResult(result, criteria)
					{
						var tbody = $("tbody");
						tbody.html("");

						for(var i = 0 ; i < result.length ; i++)
						{
							var tr = $("<tr/>");
							tr.attr("id", result[i].studentId)
							tr.appendTo(tbody);

							var td = $("<td/>");
							td.text(result[i].studentId);
							td.appendTo(tr);


							td = $("<td/>");
							if(criteria == "fname")
								td.html("<b>" + result[i].firstName + "</b>");

							else
								td.text(result[i].firstName);

							td.appendTo(tr);

							td = $("<td/>");
							if(criteria == "lname")
								td.html("<b>" + result[i].lastName + "</b>");

							else
								td.text(result[i].lastName);

							td.appendTo(tr);

							td = $("<td/>");
							td.text(result[i].phoneNumber);
							td.appendTo(tr);

							td = $("<td/>");
							td.text(result[i].emergencyPhoneNumber);
							td.appendTo(tr);

							td = $("<td/>");
							if(criteria == "bday")
								td.html("<b>" + result[i].birthdate + "</b>");

							else
								td.text(result[i].birthdate);

							td.appendTo(tr);

							td = $("<td/>");
							td.text(result[i].balance);
							td.appendTo(tr);

							td = $("<td/>");
							td.text(result[i].balanceDueDate);
							td.appendTo(tr);

							td = $("<td/>");
							td.text(result[i].courseID);
							td.appendTo(tr);
						}
						
						tableRowEvent();
					}
					
					function tableRowEvent()
					{
						$("tbody tr").click(function()
						{
							var id = $(this).attr("id");
							fadeOUTContainer();
							setTimeout(function()
							{
								location = "home.php?page=studentInfoForm&action=" + PAGE_ACTION + "&studentID=" + id;
							}, 750);
						});
					}