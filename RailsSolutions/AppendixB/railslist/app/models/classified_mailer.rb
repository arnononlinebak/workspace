class ClassifiedMailer < ActionMailer::Base
  def contact(classified, buyer, sent_at = Time.now) 
    @subject    = 'RailsList: A potential buyer has contacted you' 
    @recipients = classified.email 
    @from       = 'no-reply@yourdomain.com' 
    @sent_on    = sent_at 
    @body["title"] = classified.title 
    @body["email"] = buyer[:email] 
    @body["message"] = buyer[:message] 
  end 
  
  def classified_with_attachment(email, classified, url, sent_at = Time.now) 
    @subject    = 'RailsList: This item may be of interest to you' 
    @recipients = email 
    @from       = 'no-reply@yourdomain.com' 
    @sent_on    = sent_at 
    @body["title"] = classified.title 
    @body["description"] = classified.description 
    @body["price"] = classified.price 
    @body["url"] = url 
    unless classified.picture.blank? 
      attachment :body => classified.picture, :content_type => classified.content_type 
    end 
  end 
end
