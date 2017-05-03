// object of type student
					function student(id, fname, lname, phone, emergencyPhone, bday, balance, balanceDueDate, courseID, language)
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
						this.language = language
					}

							// array that will contain all students
					var allStudents = [];

					$(function()
					{	
						$.post("pages/home/studentInfo.php", {operation : "selectALL"}, function(data)
						{
							var json = $.parseJSON(data);
							var tbody = $("tbody");
							var html = "";
							for(var i = 0 ; i < json.length ; i++)
							{
								html += "<tr id=" + json[i].studentId + ">";
								html += "<td>" + json[i].firstName +"</td>";
								html += "<td>" + json[i].lastName +"</td>";
								html += "<td>" + json[i].phoneNumber +"</td>";
								html += "<td>" + json[i].emergencyPhoneNumber +"</td>";
								html += "<td>" + json[i].birthdate +"</td>";
								html += "<td>" + json[i].balance +"</td>";
								html += "<td>" + json[i].balanceDueDate +"</td>";
								html += "<td>" + json[i].courseID +"</td>";
								html += "<td>" + json[i].language +"</td>";
								html += "</tr>";
								
								allStudents[allStudents.length] = new student(
									json[i].studentId,
									json[i].firstName,
									json[i].lastName,
									json[i].phoneNumber,
									json[i].emergencyPhoneNumber,
									json[i].birthdate,
									json[i].balance,
									json[i].balanceDueDate,
									json[i].courseID,
									json[i].language
								);
								
							}
							tbody.html(html);
							tableRowEvent();
						});
						
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
							td.text(result[i].phone);
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